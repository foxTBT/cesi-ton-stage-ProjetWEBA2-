<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id_Offer',
        'Title_Offer', 
        'Description_Offer',
        'Salary_Offer',
        'Begin_date_Offer',
        'Duration_Offer',
        'Id_Category',
        'Id_Status',
        'Id_Account',
        'Id_Company',
        'created_at',
        'updated_at'
    ];

    public function company()
{
    return $this->belongsTo(Company::class);
}

}
