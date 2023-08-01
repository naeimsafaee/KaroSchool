<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientToCourse extends Model
{
    use HasFactory;

    protected $fillable = ['client_id' , 'course_id' , 'id'];

}
