<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Définir le nom de la table associée
    protected $table = 'applications';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Id_Account',
        'Id_Offer',
        'Cv_link_Application',
        'Cover_letter_Application',
        'Date_Application'
    ];

    // Définir les relations avec les autres modèles
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'Id_Offer');
    }
}