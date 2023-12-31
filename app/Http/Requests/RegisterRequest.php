<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required' , 'unique:clients,email' ],
            'phone' => ['required' , 'unique:clients,phone'],
            'password' => ['required', 'min:8'],
            're_try_Password' => ['required' , 'same:password'],
        ];
    }
}
