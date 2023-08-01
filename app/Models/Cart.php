<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['course_id' , 'client_id'];

    public function course()
    {
        return $this->hasOne(Course::class , 'id' , 'course_id');

    }
}
