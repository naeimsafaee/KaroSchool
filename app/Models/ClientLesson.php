<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLesson extends Model{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'client_id',
        'course_id',
    ];

}
