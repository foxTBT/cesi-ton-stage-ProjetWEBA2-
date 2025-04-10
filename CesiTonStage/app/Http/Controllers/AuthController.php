<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }







    public function login(Request $request)
    {
        if (!$request->cookie('accept_cookies')) {
            return back()->withErrors(['login' => 'Vous devez accepter les cookies pour vous connecter.']);
        }

        $request->validate([
            'Email_Account' => 'required|email',
            'Password_Account' => 'required|min:6|max:60',
        ], [
            'Email_Account.required' => 'L\'email est requis.',
            'Email_Account.email' => 'Veuillez fournir un email valide.',
            'Password_Account.required' => 'Le mot de passe est requis.',
            'Password_Account.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'Password_Account.max' => 'Le mot de passe doit faire moins de 60 caractères.',
        ]);

        $account = Account::where('Email_Account', $request->Email_Account)->first();

        if ($account && Hash::check($request->Password_Account, $account->Password_Account)) {
            session(['account' => $account]);

            // Stocker l'email dans un cookie pour 1 jour
            Cookie::queue('user_email', $account->Email_Account, 1440);

            return redirect('/');
        }

        return back()->withErrors(['login' => 'Email ou mot de passe incorrect.']);

    }


    public function logout()
    {
        session()->forget('account');
        
        // Supprime le cookie
        Cookie::queue(Cookie::forget('user_email'));

        return redirect()->route('login');
    }

    
    public function acceptCookies(Request $request)
        {
            Cookie::queue('accept_cookies', true, 1440); // 1 jour
            return response()->json(['success' => true]);
        }

    public function rejectCookies(Request $request)
        {
            Cookie::queue(Cookie::forget('accept_cookies'));
            return response()->json(['success' => true]);
        }


    public function checkCookies()
    {
        return response()->json(['accepted' => Cookie::has('accept_cookies') && Cookie::get('accept_cookies') == true]);
    }


    
    

}
