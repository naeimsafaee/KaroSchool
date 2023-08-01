<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeToAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['client_id' , 'answer_id'];

}
