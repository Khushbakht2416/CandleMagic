<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    use HasFactory;
    protected $table = "shop";
    protected $primary_key = "id";

    protected $fillable = [
        'saletag', 'imgurl', 'addtocart', 'pname', 'actualprice', 'afterdiscount', 'quantity', 'bestselling'
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


    public function productReviews()
    {
        return $this->hasMany(ProductReviewsModel::class, 'product_id', 'id');
    }
}
