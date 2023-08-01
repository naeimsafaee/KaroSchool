<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(CourseCategory::class , 'id' , 'course_category_id' );
    }
}
