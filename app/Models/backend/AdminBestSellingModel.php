<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBestSellingModel extends Model
{
    use HasFactory;
    protected $table = 'bestselling';
    protected $id = 'id';

    protected $fillable = [
        'imgurl', 'saletag', 'addtocart', 'wishlist', 'ptag', 'pname', 'actualprice', 'afterdiscount', 'ratings'
    ];
}
