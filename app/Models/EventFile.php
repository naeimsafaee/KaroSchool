<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFile extends Model {
    use HasFactory;

    protected $fillable = [
        'file' , 'event_id' , 'client_id' , 'vote'
    ];


}
