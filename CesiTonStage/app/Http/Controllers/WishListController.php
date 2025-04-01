<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function toggle($offerId)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Utilisateur non connecté'], 401);
        }

        $wishlistItem = WishList::where('Id_Account', $user->id)->where('Id_Offer', $offerId)->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            return response()->json(['status' => 'removed']);
        } else {
            WishList::create([
                'Id_Account' => $user->id,
                'Id_Offer' => $offerId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
