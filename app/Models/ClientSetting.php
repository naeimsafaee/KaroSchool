<?php

namespace App\Models;

use App\Http\Requests\SettingRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model{
    use HasFactory;

    protected $fillable = ['key' , 'value' , 'client_id'];
}
