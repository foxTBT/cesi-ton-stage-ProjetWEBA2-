<?php

namespace App\Models; // Déclare que cette classe appartient à l'espace de noms 'App\Models'

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importation de la fonctionnalité HasFactory qui permet la création de modèles avec des usines (factories)
use Illuminate\Database\Eloquent\Model; // Importation de la classe de base Eloquent Model

class WishList extends Model // Déclaration de la classe WishList qui étend la classe de base Model d'Eloquent
{
    use HasFactory; // Utilisation du trait HasFactory qui permet de générer des usines pour ce modèle

    protected $table = 'wish_lists'; // Définition explicite du nom de la table associée à ce modèle (par défaut, Laravel utilise le nom de la classe au pluriel)

    protected $fillable = [ // Déclaration des attributs de la table qui peuvent être remplis en masse (Mass Assignment)
        'Id_Account', // L'identifiant du compte utilisateur (clé étrangère vers la table des comptes)
        'Id_Offer',   // L'identifiant de l'offre (clé étrangère vers la table des offres)
    ];

    // Définition de la relation entre la wishlist et l'offre (chaque wishlist appartient à une offre)
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'Id_Offer'); // Définit une relation de type "BelongsTo" avec le modèle 'Offer' (chaque wishlist appartient à une offre via 'Id_Offer')
    }

    // Définition de la relation entre la wishlist et le compte utilisateur (chaque wishlist appartient à un compte)
    public function account()
    {
        return $this->belongsTo(Account::class, 'Id_Account'); // Définit une relation de type "BelongsTo" avec le modèle 'Account' (chaque wishlist appartient à un compte via 'Id_Account')
    }
}
