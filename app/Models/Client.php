<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use TCG\Voyager\Facades\Voyager;

class Client extends Authenticatable
{
    use Notifiable , HasApiTokens , HasFactory;

    protected $fillable =[ 'id' , 'name' , 'email' , 'phone' , 'password' , 'avatar', 'google_id' , 'verify_link' , 'status'];

    protected $appends =['image'];

    protected $hidden = ['password' , 'reset_link' , 'password_code' , 'google_id' , 'remember_token'];

    public function getImageAttribute(){

        if ($this->avatar)
            return Voyager::image($this->avatar);
        else
            return asset('assets/photo/admin.svg');

    }

    public function cart()
    {
        return $this->hasMany(Cart::class , 'client_id' , 'id');

    }

    public function course()
    {
        return $this->belongsToMany(Course::class, ClientToCourse::class);
    }


    public function medals()
    {
        return $this->hasMany(MedalToClient::class );

    }
}
