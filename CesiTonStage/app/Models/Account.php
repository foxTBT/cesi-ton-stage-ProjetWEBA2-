<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'Email_Account',
        'Password_Account',
        'First_name_Account',
        'Last_name_Account',
        'Birth_date_Account',
        'Id_Role',
    ];
}
