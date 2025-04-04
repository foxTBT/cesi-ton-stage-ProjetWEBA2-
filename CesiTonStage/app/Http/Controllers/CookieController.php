<?php

namespace App\Http\Controllers; // Déclare que cette classe appartient à l'espace de noms 'App\Http\Controllers', ce qui est la convention pour les contrôleurs dans Laravel

use Illuminate\Http\Request; // Importation de la classe Request de Laravel, permettant de gérer les requêtes HTTP
use Illuminate\Support\Facades\Cookie; // Importation de la façade Cookie de Laravel pour manipuler les cookies

class CookieController extends Controller // Déclaration de la classe CookieController qui étend le contrôleur de base
{
    // Méthode pour afficher les paramètres des cookies (vue avec l'état actuel des cookies)
    public function showCookieSettings()
    {
        // Récupérer l'état des cookies actuels
        $cookies = [
            'accept_cookies' => Cookie::get('accept_cookies'), // Récupère la valeur du cookie 'accept_cookies' (indiquant si l'utilisateur a accepté les cookies)
            'user_email' => Cookie::get('user_email') // Récupère la valeur du cookie 'user_email' (stockant l'email de l'utilisateur)
        ];

        // Retourne la vue 'cookies.settings' en passant la variable 'cookies' à la vue
        return view('cookies.settings', compact('cookies')); // 'compact' crée un tableau associatif avec les clés et valeurs des variables
    }

    // Méthode pour mettre à jour les préférences des cookies
    public function updateCookies(Request $request)
    {
        // Vérifie si le formulaire a une entrée pour 'accept_cookies' (c'est-à-dire si l'utilisateur a modifié sa préférence de cookies)
        if ($request->has('accept_cookies')) {
            // Si la préférence existe, crée ou met à jour un cookie 'accept_cookies' avec la valeur envoyée, qui expire dans 1440 minutes (24 heures)
            Cookie::queue('accept_cookies', $request->accept_cookies, 1440);
        } else {
            // Si l'utilisateur n'a pas accepté, supprime le cookie 'accept_cookies'
            Cookie::queue(Cookie::forget('accept_cookies'));
        }

        // Redirige l'utilisateur vers la page des paramètres des cookies avec un message de succès
        return redirect()->route('cookie.settings')->with('success', 'Préférences mises à jour.'); // 'route' génère l'URL pour la route 'cookie.settings' et 'with' ajoute un message de session
    }


    
}
