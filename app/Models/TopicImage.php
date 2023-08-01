<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'file' , 'topic_id' , 'name'
    ];
}
