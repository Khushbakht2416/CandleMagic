<?php

namespace App\Models\frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primarykey = 'id';

    protected $fillable = ['user_id', 'total_price', 'status', 'order_details', 'billing_details', "remember_token", 'tracking_id'];

    protected $casts = [
        'order_details' => 'array',
        'billing_details' => 'array',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id'); // Explicit foreign keys
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Explicit foreign keys
    }


}
