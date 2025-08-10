<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProductReviewsModel extends Model
{
    use HasFactory;
    protected $table = 'product_reviews';
    protected $primary_key = 'id';
}
