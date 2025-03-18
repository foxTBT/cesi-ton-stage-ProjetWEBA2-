<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Status';

    protected $fillable = [
        'Title_Status',
        'Description_Status'
    ];
}