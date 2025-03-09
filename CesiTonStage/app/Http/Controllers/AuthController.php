<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email_Account' => 'required',
            'Password_Account' => 'required',
        ]);

        $account = Account::where('Email_Account', $request->Email_Account)->where('Password_Account', $request->Password_Account)->first();

        if ($account) {
            session(['account' => $account]);

            if ($account->Id_Role === 1) { // Exemple pour restreindre l'accès à une autre page
                return redirect()->route('admin.page');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Email ou mot de passe incorrect.']);
    }

    public function logout()
    {
        session()->forget('account');
        return redirect()->route('login');
    }
}
