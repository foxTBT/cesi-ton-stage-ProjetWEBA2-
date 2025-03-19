<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Définir le nom de la table associée
    protected $table = 'statuses';

    // Définir les attributs qui peuvent être assignés en masse
    use HasFactory;

    protected $primaryKey = 'Id_Status';

    protected $fillable = [
        'Title_Status',
        'Description_Status'
    ];

    // Définir les relations avec les autres modèles
    public function offers()
    {
        return $this->hasMany(Offer::class, 'Id_Status');
    }
}