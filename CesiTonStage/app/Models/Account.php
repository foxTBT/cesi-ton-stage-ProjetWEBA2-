<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importation du trait

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'Id_Account'; // Spécifiez la clé primaire correcte
    protected $fillable = [
        'Email_Account',
        'Password_Account',
        'First_name_Account',
        'Last_name_Account',
        'Birth_date_Account',
        'Id_Role',
    ];
}
