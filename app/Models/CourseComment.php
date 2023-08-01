<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class CourseComment extends Model
{
    use HasFactory;
    protected $fillable =['course_id' , 'comment_id' , 'client_id' , 'content'];

    public function scopeActive($query){
        return $query->where('active', true);
    }

    public function getTimeAttribute()
    {
        return fa_number(Jalalian::forge($this->created_at)->format('%d  %B  %Y'));
    }

    public function reply()
    {
        return $this->hasOne(CourseComment::class , 'course_comment_id' , 'id' );
    }

    public function client()
    {
        return $this->hasOne(Client::class , 'id' , 'client_id' );
    }

    public function course()
    {
        return $this->hasOne(Course::class , 'id' , 'course_id' );
    }
}
