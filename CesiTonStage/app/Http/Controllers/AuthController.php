<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use Illuminate\Support\Facades\Cookie;

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

            // Créer un cookie qui dure 1 jour (1440 minutes)
            Cookie::queue('user_email', $account->Email_Account, 1440);

            if ((int) $account->Id_Role === 1) {
                return redirect()->route('admin.page');
                // Afficher le cookie
                
            }

            return redirect()->route('dashboard');
        }
        $user_email = Cookie::get('user_email');
        echo "User Email: " . $user_email;
        return back()->withErrors(['login' => 'Email ou mot de passe incorrect.', $user_email]);
    }

    public function logout()
    {
        session()->forget('account');
        
        // Supprime le cookie
        Cookie::queue(Cookie::forget('user_email'));

        return redirect()->route('login');
    }

}
