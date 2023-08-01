<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Facades\Voyager;

class EventResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'image'=>Voyager::image($this->image),
            'description'=>$this->description,
            'start_date' =>$this->start_date,
            'end_date' =>$this->end_date,
        ];
    }
}
