<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    // Définir le nom de la table associée
    protected $table = 'offers';
    protected $primaryKey = 'Id_Offer';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Title_Offer',
        'Description_Offer',
        'Salary_Offer',
        'Begin_date_Offer',
        'Duration_Offer',
        'Id_Category',
        'Id_Status',
        'Id_Account',
        'Id_Company'
    ];

    // Définir les relations avec les autres modèles
    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_Category');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'Id_Status');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'Id_Account');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'Id_Company');
    }
}