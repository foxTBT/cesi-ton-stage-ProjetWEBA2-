<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importation du trait

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'Id_Company';

    // Définir le nom de la table associée
    protected $table = 'companies';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Name_Company',
        'Email_Company',
        'Phone_number_Company',
        'Description_Company',
        'Siret_number_Company',
        'Logo_link_Company',
        'Id_City'
    ];

    // Définir les relations avec les autres modèles
    public function city()
    {
        return $this->belongsTo(City::class, 'Id_City');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'Id_Company');
    }

    public function ratings()
    {
        return $this->hasMany(Evaluate::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('Rating');
    }
}
