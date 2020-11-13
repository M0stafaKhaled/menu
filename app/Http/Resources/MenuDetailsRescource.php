<?php

namespace App\Http\Resources;

use App\Menu;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MenuDetailsRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['title'=>$this->title,
                'description'=>$this->description,
                 'primary'=>$this->primaryColor,
                'secondary'=>$this->secondaryColor,
                'fontColor'=>$this->font_color,
                'MenuImages' =>  $this->getImages()
            ];
    }
    public function getImages()
    {
        $list = [];
        foreach (Menu::all() as $item) {
            $list[] = Storage::url($item->image);
        }
        return $list;
    }
}
