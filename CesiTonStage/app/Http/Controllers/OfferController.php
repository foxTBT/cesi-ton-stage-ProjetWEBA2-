<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Status;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['category', 'status', 'account', 'company'])->get();
        return view('offers.index', compact('offers'));
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
            'Duration_Offer' => 'required|date',
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
            'Duration_Offer' => $request->Duration_Offer,
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
        'Duration_Offer' => 'nullable|date',
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
        'Duration_Offer' => $request->Duration_Offer,
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
}
