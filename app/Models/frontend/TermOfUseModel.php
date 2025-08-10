<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermOfUseModel extends Model
{
    use HasFactory;
    protected $table = "policy_privacy"; 
    protected $primary_key = "id"; 
}
