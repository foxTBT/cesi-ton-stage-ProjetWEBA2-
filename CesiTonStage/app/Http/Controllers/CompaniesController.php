<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Offer;
use App\Models\City;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function create()
    {
        // Vérifie si l'utilisateur a les droits pour créer une entreprise
        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return back()->with('error', "Vous ne pouvez pas créer d'entreprises, vous n'en avez pas la permission");
        }

        $cities = City::all(); // Récupère les villes pour le formulaire
        return view('companies.create', compact('cities'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'Name_Company' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Email_Company' => 'required|string|max:255',
            'Phone_number_Company' => 'required|string|max:13',
            'Description_Company' => 'required|string',
            'Siret_number_Company' => 'required|string|min:13|max:14',
            'Logo_link_Company' => 'required|string',
            'Id_City' => 'required'
        ], [
            'Name_Company.required' => 'Nom de l\'entreprise requis',
            'Name_Company.max' => 'Nom trop long',
            'Name_Company.regex' => 'Caractère invalide',
            'Email_Company.required' => 'Email requis',
            'Email_Company.max' => 'Email trop long',
            'Phone_number_Company.required' => 'Téléphone requis',
            'Phone_number_Company.max' => 'Téléphone trop long',
            'Description_Company.required' => 'Description requise',
            'Siret_number_Company.required' => 'SIRET requis',
            'Siret_number_Company.max' => 'SIRET trop long',
            'Siret_number_Company.min' => 'SIRET trop court',
            'Logo_link_Company.required' => 'Logo requis',
            'Id_City.required' => 'Ville requise',
        ]);

        Company::create([
            'Name_Company' => $request->Name_Company,
            'Email_Company' => $request->Email_Company,
            'Phone_number_Company' => $request->Phone_number_Company,
            'Description_Company' => $request->Description_Company,
            'Siret_number_Company' => $request->Siret_number_Company,
            'Logo_link_Company' => $request->Logo_link_Company,
            'Id_City' => $request->Id_City,
        ]);

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return redirect()->route('companies.index')->with('success', "Entreprise ajoutée avec succès !");
    }

    public function index()
    {
        $term = request('term'); // Recherche

        $companies = Company::with('city')
            ->when($term, function ($query, $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('Name_Company', 'LIKE', '%' . $term . '%')
                      ->orWhere('Description_Company', 'LIKE', '%' . $term . '%')
                      ->orWhere('Email_Company', 'LIKE', '%' . $term . '%')
                      ->orWhere('Phone_number_Company', 'LIKE', '%' . $term . '%');
                })
                ->orWhereHas('city', function ($q) use ($term) {
                    $q->where('Name_City', 'LIKE', '%' . $term . '%');
                });
            })
            ->paginate(8); // Pagination

        return view('companies.index')->with('companies', $companies);
    }

    public function show($Id_Company)
    {
        $term = request('term');

        $company = Company::with(['city', 'offers' => function ($query) use ($term) {
            if ($term) {
                $query->where('Title_Offer', 'LIKE', '%' . $term . '%')
                      ->orWhere('Description_Offer', 'LIKE', '%' . $term . '%')
                      ->orWhere('Salary_Offer', 'LIKE', '%' . $term . '%')
                      ->orWhere('Begin_date_Offer', 'LIKE', '%' . $term . '%');
            }
        }])
        ->where('Id_Company', $Id_Company)
        ->firstOrFail(); // 404 si introuvable

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return view('companies.show')->with('company', $company);
    }

    public function destroy($Id_Company)
    {
        // Vérifie si l'utilisateur a les droits pour supprimer
        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/')->with('error', "Vous n'avez pas la permission de supprimer une entreprise");
        }

        $company = Company::findOrFail($Id_Company);
        $company->delete();

        return redirect()->route('companies.index')->with('success', "Entreprise supprimée avec succès !");
    }

    public function edit($Id_Company)
    {
        $company = Company::findOrFail($Id_Company);
        $cities = City::all();

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return view('companies.edit', compact('company', 'cities'));
    }

    public function update(Request $request, $Id_Company)
    {
        $company = Company::findOrFail($Id_Company);

        // Validation des données
        $request->validate([
            'Name_Company' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Email_Company' => 'required|string|max:255',
            'Phone_number_Company' => 'required|string|max:13',
            'Description_Company' => 'required|string',
            'Siret_number_Company' => 'required|string|max:14',
            'Logo_link_Company' => 'required|string',
            'Id_City' => 'required'
        ], [
            'Name_Company.required' => 'Nom requis',
            'Name_Company.max' => 'Nom trop long',
            'Name_Company.regex' => 'Caractère invalide',
            'Email_Company.required' => 'Email requis',
            'Email_Company.max' => 'Email trop long',
            'Phone_number_Company.required' => 'Téléphone requis',
            'Phone_number_Company.max' => 'Téléphone trop long',
            'Description_Company.required' => 'Description requise',
            'Siret_number_Company.required' => 'SIRET requis',
            'Siret_number_Company.max' => 'SIRET trop long',
            'Logo_link_Company.required' => 'Logo requis',
            'Id_City.required' => 'Ville requise',
        ]);

        $company->update([
            'Name_Company' => $request->Name_Company,
            'Email_Company' => $request->Email_Company,
            'Phone_number_Company' => $request->Phone_number_Company,
            'Description_Company' => $request->Description_Company,
            'Siret_number_Company' => $request->Siret_number_Company,
            'Logo_link_Company' => $request->Logo_link_Company,
            'Id_City' => $request->Id_City,
        ]);

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return redirect()->route('companies.show', $company->Id_Company)->with('success', "Entreprise mise à jour avec succès !");
    }

    public function dashboard($Id_Company)
    {
        // Redirection vers la fiche de l'entreprise
        return redirect()->route('companies.show', $Id_Company);
    }
}
