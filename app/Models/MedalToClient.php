<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedalToClient extends Model
{
    use HasFactory;

    public function medal()
    {
        return $this->hasOne(Medal::class , 'id' , 'medal_id' );

    }
}
