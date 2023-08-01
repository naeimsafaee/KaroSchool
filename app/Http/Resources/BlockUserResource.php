<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlockUserResource extends JsonResource{

    public function toArray($request){
        return [
            'client_id' => $this->client_id,
            'ban_user' => $this->banned
        ];
    }
}
