<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestSellingModel extends Model
{
    use HasFactory;
    protected $table = "bestselling";
    protected $primary_key = "id";

    protected $fillable = [
        'imgurl', 'saletag', 'addtocart', 'wishlist', 'ptag', 'pname', 'actualprice', 'afterdiscount', 'ratings' , 'quantity'
    ];

    // Accessor for actualprice
    public function getActualpriceAttribute($value)
    {
        return '$' . number_format($value, 2);
    }

    // Accessor for afterdiscount
    public function getAfterdiscountAttribute($value)
    {
        return '$' . number_format($value, 2);
    }
}
