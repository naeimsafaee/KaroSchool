<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{

    public function rules(){
        return [
            'file' => [
                'required', 'file'
            ],
            'event_id' => [
                'required',
            ]
        ];
    }
}
