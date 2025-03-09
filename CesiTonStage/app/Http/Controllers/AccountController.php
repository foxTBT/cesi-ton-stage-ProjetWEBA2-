<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function create()
    {
        return view('accounts.create');
    }
    

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'Email_Account' => 'required|string|max:255',
            'Password_Account' => 'required|string|max:60', //changer le 60 quand il sera haché dans la bdd
            'First_name_Account' => 'required|string|max:128',
            'Last_name_Account' => 'required|string|max:128',
            'Birth_date_Account' => 'required|date_format:Y-m-d',
            'Id_Role' => 'required',//|exists:roles,id
        ]);
        
        Account::create([
            'Email_Account' => $request->Email_Account,
            'Password_Account' => $request->Password_Account,
            'First_name_Account' => $request->First_name_Account,
            'Last_name_Account' => $request->Last_name_Account,
            'Birth_date_Account' => $request->Birth_date_Account,
            'Id_Role' => $request->Id_Role,            
        ]);
        

        // Rediriger vers une page de succès ou afficher un message
        return redirect()->route('accounts.create')->with('success', 'Compte ajoutée avec succès !');
    }
}
