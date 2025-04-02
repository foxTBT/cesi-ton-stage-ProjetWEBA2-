<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Définir le nom de la table associée
    protected $table = 'cities';
    protected $primaryKey = 'Id_City';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Name_City',
        'Postal_code_City',
        'Id_Region'
    ];

    // Définir les relations avec les autres modèles
    public function region()
    {
        return $this->belongsTo(Region::class, 'Id_Region');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'Id_City');
    }
}