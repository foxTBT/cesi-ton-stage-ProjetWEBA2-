<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Company';

    protected $fillable = [
        'Name_Company',
        'Email_Company',
        'Phone_number_Company',
        'Description_Company',
        'Siret_number_Company',
        'Logo_link_Company',
        'Id_City'
    ];
}