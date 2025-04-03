<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\WishList;
use Illuminate\Support\Facades\DB;

//use App\Models\Dashboard;


class DashboardController extends Controller
{

    /*
    public function index()
    {
        $offers = Offer::with(['category', 'status', 'company'])->get();
        return view('dashboard.view', compact('offers'));
    }

    */

    public function index()
    {
        // Récupérer le compte de la session
        $account = session('account');

        // Vérifier si l'utilisateur est connecté
        if (!$account) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour consulter votre wishlist.');
        }

        // Récupérer les offres de la wishlist de l'utilisateur
        $wishLists = WishList::where('Id_Account', $account['Id_Account'])
            ->with('offer') // Charger les offres associées
            ->get();

        // Récupérer les offres avec le nombre de personnes ayant ajouté chaque offre à leur wishlist
        $offersWithWishCount = Offer::withCount('wishLists')->get();

        // Créer un tableau associatif pour lier les offres avec leur nombre de wish lists
        $wishCountMap = $offersWithWishCount->pluck('wish_lists_count', 'Id_Offer')->toArray();

        return view('dashboard.view', compact('wishLists', 'wishCountMap'));
    }

    public function showWishlist()
    {
        $wishLists = Offer::withCount('wishLists')->get();

        return view('wishlist', compact('wishLists'));
        dd($wishLists); // Cela affichera le contenu de $wishLists et arrêtera l'exécution
    }

}
