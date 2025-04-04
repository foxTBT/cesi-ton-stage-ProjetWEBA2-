<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    //Méthode permettant d'aller sur la vue accounts/create.blade.php
    public function create() 
    {
        return view('accounts.create');
    }

    //Méthode permettant de gérer le stockage des informations
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'Email_Account' => 'required|string|email|max:255|unique:accounts',
            'Password_Account' => 'required|string|max:60|min:6',
            'First_name_Account' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Last_name_Account' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Birth_date_Account' => 'required|date_format:Y-m-d',
            'Id_Role' => 'required|integer',
        ],[
            'Email_Account.required' => 'L\'email est requise',
            'Email_Account.email' => 'L\'email est invalide',

            'Password_Account.required' => 'Mot de passe requis',
            'Password_Account.max' => 'Mot de passe trop long ! (6 à 60 charactères)',
            'Password_Account.min' => 'Mot de passe trop court ! (6 à 60 charactères)',


            'First_name_Account.required' => 'Veuillez insérer un prénom',
            'First_name_Account.regex' => 'Caractère invalide pour le prénom',
            'First_name_Account.max' => 'Prénom trop long (maximum 128 caractère)',

            'First_name_Account.required' => 'Veuillez insérer un nom',
            'Last_name_Account.regex' => 'Caractère invalide pour le nom',
            'Last_name_Account.max' => 'Nom trop long (maximum 128 caractère)',
            
            'Birth_date_Account.required' => 'Veuillez insérer une date',

            'Id_Role.required' => 'Veillez sélectionner un rôle pour le compte'
        ]);

        // Création de l'utilisateur
        $account = Account::create([
            'Email_Account' => $request->Email_Account,
            'Password_Account' => bcrypt($request->Password_Account),
            'First_name_Account' => $request->First_name_Account,
            'Last_name_Account' => strtoupper($request->Last_name_Account),
            'Birth_date_Account' => $request->Birth_date_Account,
            'Id_Role' => $request->Id_Role,
        ]);
        // Vérifier si l'utilisateur souhaite être "retenu" dans la session
        if ($request->has('remember')) {
            session(['account' => $account]);
        }

        // Redirection avec message de succès
        return redirect()->route('welcome')->with('success', 'Compte ajouté avec succès !');
    }

    //Méthode permettant d'afficher les pilotes
    public function showPilote()
    {

        if (!session('account') || (int) session('account')->Id_Role < 2) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return redirect('/')->with('error', "Vous n'avez pas la permission d'acèder à cette ressource");
        }

        $term = request('term');
        $pilotes = Account::where('Id_Role', 2)
            ->where(function ($query) use ($term) {
                $query->orWhere('First_name_Account', 'LIKE', '%' . $term . '%')
                    ->orWhere('Last_name_Account', 'LIKE', '%' . $term . '%');
            })
            ->paginate(8);
        return view('accounts.show-pilote', compact('pilotes'));
    }
    
    //Méthode permettant d'afficher les étudiants
    public function showStudent()
    {

        if (!session('account') || (int) session('account')->Id_Role < 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return redirect('/')->with('error', "Vous n'avez pas la permission d'acèder à cette ressource");
        }

        $term = request('term');
        $students = Account::where('Id_Role', 1)
            ->where(function ($query) use ($term) {
                $query->orWhere('First_name_Account', 'LIKE', '%' . $term . '%')
                    ->orWhere('Last_name_Account', 'LIKE', '%' . $term . '%');
            })
            ->paginate(8);
        return view('accounts.show-student', compact('students'));
    }

    //Méthode permettant d'effectuer le soft delete d'un compte par son {Id_Account}
    public function destroy(Request $request, $id)
    {


        $account = Account::findOrFail($id); //Si on ne le met pas avant on ne peut pas comparer avec l'id role de la personne qui supprime


        if (!session('account') || (int) session('account')->Id_Role < ($account->Id_Role)) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez pas supprimer l'élève, vous n'en avez pas la permission");
        }

        $account->delete();

        $source = $request->input('source');

        // Vérification de la valeur de source
        if ($source === 'show-student') {
            return redirect()->route('accounts.show-student')->with('success', [
                'surname' => $account->Last_name_Account,
                'lastname' => $account->First_name_Account
            ]);
        } elseif ($source === 'show-pilote') {
            return redirect()->route('accounts.show-pilote')->with('success', [
                'surname' => $account->Last_name_Account,
                'lastname' => $account->First_name_Account
            ]);
        } else {
            // Afficher un message d'erreur si la source n'est pas reconnue
            return redirect()->route('accounts.show-pilote')->with('error', 'Source inconnue.');
        }
    }

    //Méthode permettant la modification d'un compte par son {Id_Account}
    public function edit($id)
    {
        $account = Account::findOrFail($id);


        if (!session('account') || (int) session('account')->Id_Role < ($account->Id_Role)) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return back()->with('error', "Vous ne pouvez pas supprimer l'élève, vous n'en avez pas la permission");
        }

        return view('accounts.edit', compact('account'));
    }

    //Méthode permettant la mise à jour des données après leur modifications
    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        // Validation des données
        $request->validate([
            'Email_Account' => 'required|string|email|max:255',
            'First_name_Account' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Last_name_Account' => 'required|string|max:128|regex:/^[\pL\s]+$/u',
            'Birth_date_Account' => 'required|date_format:Y-m-d',
            'Id_Role' => 'required|integer',
        ],[
            'Email_Account.required' => 'L\'email est requise',
            'Email_Account.email' => 'L\'email est invalide',

            'First_name_Account.required' => 'Veuillez insérer un prénom',
            'First_name_Account.regex' => 'Charactère invalide pour le prénom',
            'First_name_Account.max' => 'Prénom trop long (maximum 128 charactère)',

            'First_name_Account.required' => 'Veuillez insérer un nom',
            'Last_name_Account.regex' => 'Caractère invalide pour le nom',
            'Last_name_Account.max' => 'Nom trop long (maximum 128 caractère)',
            
            'Birth_date_Account.required' => 'Veuillez insérer une date',

            'Id_Role.required' => 'Veillez sélectionner un rôle pour le compte'
        ]);

        // Mise à jour des données
        $account->update([
            'Email_Account' => strtolower($request->Email_Account),
            'First_name_Account' => $request->First_name_Account,
            'Last_name_Account' => $request->Last_name_Account,
            'Birth_date_Account' => $request->Birth_date_Account,
            'Id_Role' => $request->Id_Role,
        ]);

        // Redirection conditionnelle en fonction du rôle
        if ($account->Id_Role == 1) {
            // Redirection vers la vue des étudiants
            return redirect()->route('accounts.show-student')/*->with('success', 'Compte mis à jour avec succès !')*/;
        } elseif ($account->Id_Role == 2) {
            // Redirection vers la vue des pilotes
            return redirect()->route('accounts.show-pilote')/*->with('success', 'Compte mis à jour avec succès !')*/;
        }
    }

    //Méthode permettant d'afficher spécifiquement un étudiants via son {Id_Account}
    public function showStudentDetails($id)
    {

        if ((int)session('account')->Id_Account != $id && (int) session('account')->Id_Role == 1) {
            // Rediriger l'utilisateur avec un message d'erreur (il n'est pas censé s'afficher car il y a en amont un bloquage visuel)
            return redirect('/')->with('error', "Vous n'avez pas la permission d'accèder à cette ressource");
        }

        $account = Account::with('role', 'application.offer')->findOrFail($id);
        return view('accounts.show-student-details', compact('account'));
    }
}
