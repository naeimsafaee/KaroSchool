<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Blog extends Model
{
    use HasFactory;

    protected $appends = ['slug'];

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
        return $this->hasOne(BlogCategory::class , 'id' , 'blog_category_id' );
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class)->active();
    }

}
