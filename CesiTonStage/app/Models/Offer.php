<?php

namespace App\Models;

// Importation des classes nécessaires pour le modèle
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 

class Offer extends Model
{
    // Utilisation du trait SoftDeletes pour activer les suppressions douces
    use SoftDeletes;

    // Définir le nom de la table associée à ce modèle
    protected $table = 'offers'; 
    protected $primaryKey = 'Id_Offer'; 

    // Indique que la colonne 'deleted_at' doit être traitée comme une date pour les suppressions douces
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

    // Relation avec le modèle Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_Category');
    }

    // Relation avec le modèle Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'Id_Status');
    }

    // Relation avec le modèle Account
    public function account()
    {
        return $this->belongsTo(Account::class, 'Id_Account');
    }

    // Relation avec le modèle Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'Id_Company');
    }

    // Relation avec le modèle Skill (compétences)
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'gots', 'Id_Offer', 'Id_Skill');
    }

    // Relation avec le modèle Application
    public function applications()
    {
        return $this->hasMany(Application::class, 'Id_Offer');
    }
}