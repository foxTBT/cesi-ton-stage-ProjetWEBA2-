<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }
    

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Name_Company' => 'required|string|max:128',
            'Email_Company' => 'required|string|max:255',
            'Phone_number_Company' => 'required|string|max:13',
            'Description_Company' => 'required|string',
            'Siret_number_Company' => 'required|string|max:14',
            'Logo_link_Company' => 'required|string',
            'Id_City' => 'required'//|exists:cities,id
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
        

        // Rediriger vers une page de succès ou afficher un message
        return redirect()->route('companies.create')->with('success', 'Entreprise ajoutée avec succès !');
    }

    public function search()
    {
        $term = request('term');

        $companies = Company::where('Name_Company','LIKE','%'.$term.'%')
                ->orWhere('Description_Company','LIKE','%'.$term.'%')
                ->orWhere('Siret_number_Company','LIKE','%'.$term.'%')
                ->paginate(10);

        return view('companies.search')->with('companies', $companies);
    }
}
