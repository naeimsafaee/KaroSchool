<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale_date extends Model
{
    use HasFactory;


    protected $casts = [
      'end_date' => 'date'
    ];

}
