<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Status;
use Carbon\Carbon; // Assurez-vous d'importer Carbon


class OfferController extends Controller
{
    public function index()
    {
        $term = request('term');
        $user = session('account'); // Récupérer l'utilisateur actuel

        // Récupérer toutes les offres avec leurs relations
        $offers = Offer::with(['category', 'status', 'account', 'company'])
            ->when($term, function ($query, $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('Title_Offer', 'LIKE', '%' . $term . '%')
                        ->orWhere('Description_Offer', 'LIKE', '%' . $term . '%')
                        ->orWhere('Salary_Offer', 'LIKE', '%' . $term . '%')
                        ->orWhere('Begin_date_Offer', 'LIKE', '%' . $term . '%');
                })
                    ->orWhereHas('company', function ($q) use ($term) {
                        $q->where('Name_Company', 'LIKE', '%' . $term . '%');
                    });
            })
            ->paginate(6);

        // Vérifier si l'utilisateur a postulé pour chaque offre
        foreach ($offers as $offer) {
            $offer->hasApplied = $offer->applications()->where('Id_Account', $user->Id_Account)->exists();
        }

        return view('offers.index', compact('offers', 'term'));
    }


    public function show($id)
    {
        $offer = Offer::with(['category', 'status', 'account', 'company'])->findOrFail($id);
        return view('offers.index', compact('offer'));
    }

    public function create()
    {

        if (!session('account') || (int) session('account')->Id_Role == 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez pas créer d'offre, vous n'en avez pas la permission");
        }

        $accounts = Account::whereIn('Id_Role', [2, 3])->get();
        $companies = Company::all();
        $statuses = Status::whereIn('Id_Status', [1])->get();
        $skills = Skill::all(); // Récupérer toutes les compétences

        return view('offers.create', compact('accounts', 'companies', 'statuses', 'skills'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Title_Offer' => 'required|string|max:255',
            'Description_Offer' => 'required|string|max:65535',
            'Begin_date_Offer' => 'required|date',
            'End_date_Offer' => 'required|date',
            'Salary_Offer' => 'required|integer',
            'Id_Category' => 'required|integer',
            'Id_Status' => 'required|integer',
            'Id_Account' => 'required|integer',
            'Id_Company' => 'required|integer',
            'skills' => 'array', // Validation pour les compétences
            'skills.*' => 'integer|exists:skills,Id_Skill', // Validation pour chaque compétence
        ]);

        $offer = Offer::create([
            'Title_Offer' => $request->Title_Offer,
            'Description_Offer' => $request->Description_Offer,
            'Begin_date_Offer' => $request->Begin_date_Offer,
            'End_date_Offer' => $request->End_date_Offer,
            'Salary_Offer' => $request->Salary_Offer,
            'Id_Category' => $request->Id_Category,
            'Id_Status' => $request->Id_Status,
            'Id_Account' => $request->Id_Account,
            'Id_Company' => $request->Id_Company,
        ]);

        // Attacher les compétences à l'offre
        if ($request->has('skills')) {
            $offer->skills()->attach($request->skills);
        }

        return redirect()->route('offers.index')->with('success', 'Offre ajoutée avec succès !');
    }

    public function edit($id)
    {

        if (!session('account') || (int) session('account')->Id_Role == 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez modifier cette offre, vous n'avez pas la permission pour.");
        }
        $offer = Offer::with('skills')->findOrFail($id); // Récupérer l'offre avec les compétences associées
        $categories = Category::all(); // Récupérer toutes les catégories
        $statuses = Status::all(); // Récupérer tous les statuts
        $accounts = Account::whereIn('Id_Role', [2, 3])->get(); // Récupérer les comptes avec les rôles appropriés
        $skills = Skill::all(); // Récupérer toutes les compétences
        $companies = Company::all(); // Récupérer toutes les entreprises

        return view('offers.edit', compact('offer', 'categories', 'statuses', 'accounts', 'skills', 'companies'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'Title_Offer' => 'required|string|max:255',
            'Description_Offer' => 'required|string|max:65535',
            'Salary_Offer' => 'required|numeric',
            'Begin_date_Offer' => 'required|date',
            'End_date_Offer' => 'nullable|date',
            'Id_Category' => 'required|integer',
            'Id_Status' => 'required|integer',
            'Id_Account' => 'required|integer',
            'Id_Company' => 'required|integer',
            'skills' => 'array', // Validation pour les compétences
            'skills.*' => 'integer|exists:skills,Id_Skill', // Validation pour chaque compétence
        ]);

        // Récupérer l'offre à mettre à jour
        $offer = Offer::findOrFail($id);

        // Mettre à jour les informations de l'offre
        $offer->update([
            'Title_Offer' => $request->Title_Offer,
            'Description_Offer' => $request->Description_Offer,
            'Salary_Offer' => $request->Salary_Offer,
            'Begin_date_Offer' => $request->Begin_date_Offer,
            'End_date_Offer' => $request->End_date_Offer,
            'Id_Category' => $request->Id_Category,
            'Id_Status' => $request->Id_Status,
            'Id_Account' => $request->Id_Account,
            'Id_Company' => $request->Id_Company,
        ]);

        // Mettre à jour les compétences associées
        if ($request->has('skills')) {
            $offer->skills()->sync($request->skills); // Utiliser sync pour mettre à jour les compétences
        } else {
            $offer->skills()->sync([]); // Si aucune compétence n'est sélectionnée, dissocier toutes les compétences
        }

        return redirect()->route('offers.index')->with('success', 'Offre mise à jour avec succès !');
    }


    public function destroy($id)
    {

        if (!session('account') || (int) session('account')->Id_Role == 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez pas supprimer cette offre, vous n'avez pas la permission");
        }


        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->route('offers.index')->with('success', 'Offre supprimée avec succès.');
    }

    public function analytics(Request $request)
    {
        // Répartition par compétence - Top 5
        $skillsDistribution = DB::table('gots')
            ->select('Id_Skill', DB::raw('count(*) as total'))
            ->groupBy('Id_Skill')
            ->orderBy('total', 'desc') // Trier par le nombre total
            ->limit(5) // Limiter à 5 compétences
            ->get();

        // Récupérer les compétences
        $skills = Skill::all()->keyBy('Id_Skill');

        // Durée des offres avec tri
        $sortOrder = $request->get('sort', 'asc'); // Récupérer l'ordre de tri (asc ou desc)
        $offersDuration = Offer::select('Id_Offer', 'Title_Offer', DB::raw('DATEDIFF(End_date_Offer, Begin_date_Offer) as duration'))
            ->orderBy('duration', $sortOrder)
            ->limit(10) // Limiter à 10 résultats
            ->get();

        // Top des offres mises en wish-list avec le nom de l'offre
        $topWishListedOffers = DB::table('wish_lists')
            ->join('offers', 'wish_lists.Id_Offer', '=', 'offers.Id_Offer') // Joindre la table des offres
            ->select('offers.Id_Offer', 'offers.Title_Offer', DB::raw('count(*) as total'))
            ->groupBy('offers.Id_Offer', 'offers.Title_Offer') // Grouper par ID et titre de l'offre
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('offers.analytics', compact('skillsDistribution', 'skills', 'offersDuration', 'topWishListedOffers'));
    }
}
