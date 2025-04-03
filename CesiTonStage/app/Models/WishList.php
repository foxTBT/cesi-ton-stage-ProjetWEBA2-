<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wish_lists';

    protected $fillable = [
        'Id_Account',
        'Id_Offer',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'Id_Offer');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'Id_Account');
    }
}