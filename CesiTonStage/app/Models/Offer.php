<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Offer';

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