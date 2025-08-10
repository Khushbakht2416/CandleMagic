<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviewsModel extends Model
{
    use HasFactory;

    protected $table = "product_reviews";
    protected $primary_key = "id";
    protected $fillable = [
        'rname', 'date', 'rmessage', 'imageurl', 'product_id'
    ];

    public function shop()
    {
        return $this->belongsTo(ShopModel::class, 'product_id', 'id');
    }
}
