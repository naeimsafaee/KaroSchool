<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model{
    use HasFactory;

    protected $fillable = ['client_id' , 'banned_client_id'];

    public function banned(){
        return $this->hasOne(Client::class , 'id' , 'banned_client_id');
    }

}
