<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller

{
    public function showCookieSettings()
    {
        // Récupérer l'état des cookies
        $cookies = [
            'accept_cookies' => Cookie::get('accept_cookies'),
            'user_email' => Cookie::get('user_email')
        ];

        return view('cookies.settings', compact('cookies'));
    }

    public function updateCookies(Request $request)
    {
        if ($request->has('accept_cookies')) {
            Cookie::queue('accept_cookies', $request->accept_cookies, 1440);
        } else {
            Cookie::queue(Cookie::forget('accept_cookies'));
        }

        return redirect()->route('cookie.settings')->with('success', 'Préférences mises à jour.');
    }
}
