<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Facades\Voyager;

class ClientResource extends JsonResource{

    public function toArray($request){
        return [
            'id' => $this->id,
            'avatar' => Voyager::image($this->avatar),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ];
    }
}
