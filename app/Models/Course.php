<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Course extends Model
{
    use HasFactory;

    protected $fillable =[ 'id' , 'title' , 'image' , 'description' , 'hour' ,
        'price' , 'file' , 'teacher_id' , 'course_category_id' ];

    public function getSummeryAttribute(){
        $str = substr(strip_tags($this->description), 0, 200);
        return str_replace( '&zwnj;'," " , (substr($str, 0, strrpos($str, " "))) . ' ...');
    }

    public function getTimeAttribute()
    {
        return fa_number(Jalalian::forge($this->created_at)->format('%d  %B  %Y'));
    }


    public function getSlugAttribute()
    {
        return str_replace(' ', '_', $this->title);

    }

    public function category()
    {
        return $this->belongsToMany( CourseCategory::class , CourseToCategory::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class );
    }

    public function tool()
    {
        return $this->belongsToMany( Tool::class , CourseToTool::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class ,'id' , 'teacher_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class )->orderBy('order');
    }

    public function comments()
    {
        return $this->hasMany(CourseComment::class)->active();
    }

    public function pre_courses()
    {
        return $this->belongsToMany(
            Course::class,
            PreCourse::class,
            'course_id',
            'pre_course_id',

        );
    }



}
