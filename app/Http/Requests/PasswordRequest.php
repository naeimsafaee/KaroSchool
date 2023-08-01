<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest{

    public function rules(){
        return [
            'password' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
        ];
    }
}
