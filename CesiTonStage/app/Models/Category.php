<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Category';

    protected $fillable = [
        'Name_Category',
        'Description_Category'
    ];
}