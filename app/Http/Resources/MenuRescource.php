<?php

namespace App\Http\Resources;

use App\MenuDetails;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'image'=>asset($this->image)
        ];

    }
}
