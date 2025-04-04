<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importation du trait


class Offer extends Model
{
    use SoftDeletes;

    // Définir le nom de la table associée
    protected $table = 'offers';
    protected $primaryKey = 'Id_Offer';

    protected $dates = ['deleted_at'];

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'Title_Offer',
        'Description_Offer',
        'Salary_Offer',
        'Begin_date_Offer',
        'End_date_Offer',
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

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'gots', 'Id_Offer', 'Id_Skill');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'Id_Offer');
    }

}
