<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResource extends JsonResource
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
            "category_id"=>$this->category_id,
            "name"=>$this->name,
            "Unit_price"=>$this->Unit_price,
            "image"=> Storage::url($this->image)

            ];
    }


}
