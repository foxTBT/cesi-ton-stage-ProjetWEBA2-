<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    // Définir le nom de la table associée
    protected $table = 'skills';
    protected $primaryKey = 'Id_Skill';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Name_Skill',
    ];

    // Définir la relation avec le modèle Offer
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'gots', 'Id_Skill', 'Id_Offer');
    }
}