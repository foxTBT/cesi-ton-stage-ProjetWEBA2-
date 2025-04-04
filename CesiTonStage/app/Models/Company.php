<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;

    // Utilisation du trait SoftDeletes pour activer les suppressions douces    
    use SoftDeletes;

    // Indique que la colonne 'deleted_at' doit être traitée comme une date pour les suppressions douces
    protected $dates = ['deleted_at'];

    // Définition de la clée primaire
    protected $primaryKey = 'Id_Company';

    // Définition du nom de la table associée au modèle
    protected $table = 'companies';

    // Définition des attributs que l'on va utiliser
    protected $fillable = [
        'Name_Company',
        'Email_Company',
        'Phone_number_Company',
        'Description_Company',
        'Siret_number_Company',
        'Logo_link_Company',
        'Id_City'
    ];

    // Définition des relations avec les autres modèles
    public function city() // Avec city, car une compagnie se situe dans une ville
    {
        return $this->belongsTo(City::class, 'Id_City');
    }

    public function offers() // Avec offers, car une compagnie possède une ou plusieurs offres
    {
        return $this->hasMany(Offer::class, 'Id_Company');
    }

    public function ratings() // Avec ratings, car une compagnie possède une ou plusieurs notes données par les utilisateurs
    {
        return $this->hasMany(Evaluate::class);
    }
}
