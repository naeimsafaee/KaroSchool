<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientToDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id' ,
        'discount_code_id'
    ];
}
