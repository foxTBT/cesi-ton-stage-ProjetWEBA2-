<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    public function toggle($offerId)
    {
        $account = session('account');

        // Vérification si l'utilisateur est connecté
        if (!$account) {
            return response()->json(['status' => 'error', 'message' => 'Utilisateur non connecté'], 401);
        }

        // Vérification du rôle (seuls les utilisateurs avec Id_Role = 1 peuvent modifier la wishlist)
        if ($account['Id_Role'] != 1) {
            return response()->json(['status' => 'error', 'message' => 'Vous n\'avez pas les droits nécessaires'], 403);
        }

        $userId = $account['Id_Account'];

        // Vérifier si l'offre est déjà en wishlist
        $wishlistItem = WishList::where('Id_Account', $userId)->where('Id_Offer', $offerId)->first();

        if ($wishlistItem) {
            // Supprimer de la base de données et mettre à jour la session
            $wishlistItem->delete();

            // Mise à jour de la session (supprime l'ID de l'offre)
            $wishlist = session('wishlist', []);
            session(['wishlist' => array_values(array_diff($wishlist, [$offerId]))]);

            return response()->json(['status' => 'removed']);
        } else {
            // Ajouter à la base de données et mettre à jour la session
            WishList::create([
                'Id_Account' => $userId,
                'Id_Offer' => $offerId,
            ]);

            // Mise à jour de la session (ajoute l'ID de l'offre)
            $wishlist = session('wishlist', []);
            $wishlist[] = $offerId;
            session(['wishlist' => $wishlist]);

            return response()->json(['status' => 'added']);
        }
    }
}
