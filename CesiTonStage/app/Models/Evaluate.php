<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    use HasFactory;

    protected $table = 'evaluates';
    protected $fillable = [
        'Id_Account',
        'Id_Company',
        'Rating',
    ];
}
