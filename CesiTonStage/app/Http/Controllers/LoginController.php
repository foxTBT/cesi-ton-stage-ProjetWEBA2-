<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class LoginController extends Controller
{
    public function create()
    {
        return view('create_account.create');
    }

    public function store(Request $request) {
        // Validation des données
        $request->validate([
            'Email_Account' => 'required|string|email|max:255|unique:accounts',
            'Password_Account' => 'required|string|max:60',
            'First_name_Account' => 'required|string|max:128',
            'Last_name_Account' => 'required|string|max:128',
            'Birth_date_Account' => 'required|date_format:Y-m-d',
            'Id_Role' => 'required|integer',
        ]);
    
        // Création de l'utilisateur
        $account = Account::create([
            'Email_Account' => $request->Email_Account,
            'Password_Account' => bcrypt($request->Password_Account),
            'First_name_Account' => $request->First_name_Account,
            'Last_name_Account' => $request->Last_name_Account,
            'Birth_date_Account' => $request->Birth_date_Account,
            'Id_Role' => $request->Id_Role,
        ]);
    
        // Vérifier si l'utilisateur souhaite être "retenu" dans la session
        if ($request->has('remember')) {
            session(['account' => $account]);
        }
    
        // Redirection avec message de succès
        return redirect()->route('create_account.create')->with('success', 'Compte ajouté avec succès !');
    }
}
