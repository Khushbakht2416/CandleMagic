<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $primarykey = "id";

    protected $fillable = ['order_id', 'payment_method', 'transaction_id', 'amount', 'currency', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
