<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function create()
    {
        return view('account.create');
    }

    public function store(Request $request)
    {
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
        return redirect()->route('account.create')->with('success', 'Compte ajouté avec succès !');
    }

    public function showPilote()
    {
        $term = request('term');
        $pilotes = Account::where('Id_Role', 2)
            ->where(function ($query) use ($term) {
                $query->orWhere('First_name_Account', 'LIKE', '%' . $term . '%')
                    ->orWhere('Last_name_Account', 'LIKE', '%' . $term . '%');
            })
            ->paginate(10);
        return view('account.show-pilote', compact('pilotes'));
    }

    public function showStudent()
    {
        $term = request('term');
        $students = Account::where('Id_Role', 1)
            ->where(function ($query) use ($term) {
                $query->orWhere('First_name_Account', 'LIKE', '%' . $term . '%')
                    ->orWhere('Last_name_Account', 'LIKE', '%' . $term . '%');
            })
            ->paginate(10);
        return view('account.show-student', compact('students'));
    }

    public function destroy(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        $source = $request->input('source');

        // Vérification de la valeur de source
        if ($source === 'show-student') {
            return redirect()->route('account.show-student')->with('success', [
                'surname' => $account->Last_name_Account,
                'lastname' => $account->First_name_Account
            ]);
        } elseif ($source === 'show-pilote') {
            return redirect()->route('account.show-pilote')->with('success', [
                'surname' => $account->Last_name_Account,
                'lastname' => $account->First_name_Account
            ]);
        } else {
            // Afficher un message d'erreur si la source n'est pas reconnue
            return redirect()->route('account.show-pilote')->with('error', 'Source inconnue.');
        }
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('account.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        // Validation des données
        $request->validate([
            'Email_Account' => 'required|string|email|max:255|unique:accounts,Email_Account,' . $id . ',Id_Account',
            'First_name_Account' => 'required|string|max:128',
            'Last_name_Account' => 'required|string|max:128',
            'Birth_date_Account' => 'required|date_format:Y-m-d',
            'Id_Role' => 'required|integer',
        ]);

        // Mise à jour des données
        $account->update([
            'Email_Account' => $request->Email_Account,
            'First_name_Account' => $request->First_name_Account,
            'Last_name_Account' => $request->Last_name_Account,
            'Birth_date_Account' => $request->Birth_date_Account,
            'Id_Role' => $request->Id_Role,
        ]);

        // Redirection conditionnelle en fonction du rôle
        if ($account->Id_Role == 1) {
            // Redirection vers la vue des étudiants
            return redirect()->route('account.show-student')/*->with('success', 'Compte mis à jour avec succès !')*/;
        } elseif ($account->Id_Role == 2) {
            // Redirection vers la vue des pilotes
            return redirect()->route('account.show-pilote')/*->with('success', 'Compte mis à jour avec succès !')*/;
        }
        // else {
        //     // Redirection par défaut
        //     return redirect()->route('account.show', $account->Id_Account)->with('success', 'Compte mis à jour avec succès !');
        // }
    }
    /*
    public function show($id)
    {
        $account = Account::findOrFail($id);
        return view('account.show', compact('account'));
    }
*/
    public function showStudentDetails($id)
    {
        $account = Account::with('role', 'application.offer')->findOrFail($id);
        return view('account.show-student-details', compact('account'));
    }
}
