<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable =['id' , 'title' , 'description' , 'file' , 'time' ,
        'course_id' , 'order'];

    public function getSummeryAttribute(){
        $str = substr(strip_tags($this->description), 0, 500);
        return str_replace( '&zwnj;'," " , (substr($str, 0, strrpos($str, " "))) . ' ...');
    }
}
