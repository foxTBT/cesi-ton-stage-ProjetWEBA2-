<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\City;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function create()
    {

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez pas créer d'entreprises, vous n'en avez pas la permission");
        }
        
        $cities = City::all();
        return view('companies.create', compact('cities'));
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Name_Company' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Email_Company' => 'required|string|max:255',
            'Phone_number_Company' => 'required|string|max:13',
            'Description_Company' => 'required|string',
            'Siret_number_Company' => 'required|string|min:13|max:14',
            'Logo_link_Company' => 'required|string',
            'Id_City' => 'required' //|exists:cities,id
        ], [
            'Name_Company.required' => 'Nom de l\'entreprise requis',
            'Name_Company.max' => 'Nom de l\'entreprise est trop long (maximum 128)',
            'Name_Company.regex' => 'Charactère invalide pour le nom de l\'entreprise',


            'Email_Company.required' => 'L\'email de l\'entreprise est requise',
            'Email_Company.max' => 'L\'email de l\'entreprise est trop long (maximum 255)',

            'Phone_number_Company.required' => 'Numéro de téléphone de l\'entreprise requis',
            'Phone_number_Company.max' => 'Numéro de téléphone de l\'entreprise trop long (maximum 13)',

            'Description_Company.required' => 'Description de l\'entreprise requis',

            'Siret_number_Company.required' => 'Numéro de SIRET de l\'entreprise requis',
            'Siret_number_Company.max' => 'Numéro de SIRET de l\'entreprise trop long (maximum 14)',
            'Siret_number_Company.min' => 'Numéro de SIRET de l\'entreprise trop long (minimum 14)',

            'Logo_link_Company.required' => 'bar',

            'Id_City.required' => 'Ville de l\'entreprise requis',

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

        // Rediriger vers une page de succès ou afficher un message
        return redirect()->route('companies.index')
            ->with('success', "Entreprise ajoutée avec succès !")
            ->with('error', "Erreur rencontrée lors de l'ajout de l'entreprise !");
    }

    public function index()
    {
        $term = request('term');

        $companies = Company::where('Name_Company', 'LIKE', '%' . $term . '%')
            ->orWhere('Description_Company', 'LIKE', '%' . $term . '%')
            ->orWhere('Email_Company', 'LIKE', '%' . $term . '%')
            ->orWhere('Phone_number_Company', 'LIKE', '%' . $term . '%')
            ->with('city')
            ->paginate(8);

        return view('companies.index')->with('companies', $companies);
    }

    public function show($Id_Company)
    {
        $company = Company::where('Id_Company', $Id_Company)
            ->with('city')
            ->firstOrFail();

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return view('companies.show')->with('company', $company);
    }


    public function destroy($Id_Company)
    {
        if (!session('account') || (int) session('account')->Id_Role < 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return redirect('/')->with('error', "Vous n'avez pas la permission de supprimer une entreprise");
        }
        
        $company = Company::findOrFail($Id_Company);
        $company->delete();


        return redirect()->route('companies.index')
            ->with('success', "Entreprise supprimée avec succès !")
            ->with('error', "Erreur rencontrée lors de la suppression de l'entreprise !");
    }

    public function edit($Id_Company)
    {
        $company = Company::findOrFail($Id_Company);
        $cities = City::all();

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            return redirect('/login');
        }

        return view('companies.edit', compact('company','cities'));
    }

    public function update(Request $request, $Id_Company)
    {
        $company = Company::findOrFail($Id_Company);

        // Valider les données du formulaire
        $request->validate([
            'Name_Company' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Email_Company' => 'required|string|max:255',
            'Phone_number_Company' => 'required|string|max:13',
            'Description_Company' => 'required|string',
            'Siret_number_Company' => 'required|string|max:14',
            'Logo_link_Company' => 'required|string',
            'Id_City' => 'required' //|exists:cities,id
        ], [
            'Name_Company.required' => 'Nom de l\'entreprise requis',
            'Name_Company.max' => 'Nom de l\'entreprise est trop long (maximum 128)',
            'Name_Company.regex' => 'Charactère invalide pour le nom de l\'entreprise',


            'Email_Company.required' => 'L\'email de l\'entreprise est requise',
            'Email_Company.max' => 'L\'email de l\'entreprise est trop long (maximum 255)',

            'Phone_number_Company.required' => 'Numéro de téléphone de l\'entreprise requis',
            'Phone_number_Company.max' => 'Numéro de téléphone de l\'entreprise trop long (maximum 13)',

            'Description_Company.required' => 'Description de l\'entreprise requis',

            'Siret_number_Company.required' => 'Numéro de SIRET de l\'entreprise requis',
            'Siret_number_Company.max' => 'Numéro de SIRET de l\'entreprise trop long (maximum 14)',


            'Logo_link_Company.required' => 'bar',

            'Id_City.required' => 'Ville de l\'entreprise requis',

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

        return redirect()->route('companies.show', $company->Id_Company)
            ->with('success', "Entreprise mise à jour avec succès !")
            ->with('error', "Erreur rencontrée lors de la mise à jour de l'entreprise !");
    }

    public function dashboard($Id_Company) {

        return redirect()->route('companies.show', $Id_Company);
    }
}
