<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Définir le nom de la table associée
    protected $table = 'categories';
    protected $primaryKey = 'Id_Category';


    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Name_Category',
        'Description_Category'
    ];

    // Définir les relations avec les autres modèles
    public function offers()
    {
        return $this->hasMany(Offer::class, 'Id_Category');
    }
}