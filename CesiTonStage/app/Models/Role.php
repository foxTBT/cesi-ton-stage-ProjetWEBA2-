<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Role';

    protected $fillable = [
        'Title_Role',
        'Description_role',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'Id_Role');
    }
}