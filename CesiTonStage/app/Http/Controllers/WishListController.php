<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;

class WishListController extends Controller
{
    public function add(Request $request, $offerId)
    {
        // Récupérer le compte de la session
        $account = session('account');

        // Vérifier si l'utilisateur est connecté
        if (!$account) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour ajouter une offre à votre wishlist.');
        }

        // Vérifier si l'offre est déjà dans la wishlist
        $exists = WishList::where('Id_Account', $account['Id_Account'])
            ->where('Id_Offer', $offerId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Cette offre est déjà dans votre wishlist.');
        }

        // Ajouter l'offre à la wishlist
        WishList::create([
            'Id_Account' => $account['Id_Account'], // Utilisation de l'ID de l'utilisateur stocké dans la session
            'Id_Offer' => $offerId,
        ]);

        return redirect()->back()->with('success', 'Offre ajoutée à votre wishlist.');
    }
    public function remove($offerId)
    {
        // Récupérer le compte de la session
        $account = session('account');

        // Vérifier si l'utilisateur est connecté
        if (!$account) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour retirer une offre de votre wishlist.');
        }

        // Retirer l'offre de la wishlist
        WishList::where('Id_Account', $account['Id_Account'])
            ->where('Id_Offer', $offerId)
            ->delete();

        return redirect()->back()->with('success', 'Offre retirée de votre wishlist.');
    }

    public function index()
    {
        // Récupérer le compte de la session
        $account = session('account');

        // Vérifier si l'utilisateur est connecté
        if (!$account) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour consulter votre wishlist.');
        }

        // Récupérer les offres de la wishlist
        $wishLists = WishList::where('Id_Account', $account['Id_Account'])->with('offer')->get();

        return view('wishlist.index', compact('wishLists'));
    }
}
