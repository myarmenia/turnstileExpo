<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
            return $data =  [
            'id' => $this->id,
            'title_en' => $this->title_en,
            'title_am' => $this->title_am,
            'title_ru' => $this->title_ru,
            'description_en' => $this->description_en,
            'description_am' => $this->description_am,
            'description_ru' => $this->description_ru,
            'image' => Storage::path($this->image),
            'button_text_en' => $this->button_text_en,
            'button_text_am' => $this->button_text_am,
            "button_text_ru" => $this->button_text_ru,
            "button_link" => $this->button_link,
            "status" => $this->status,
        ];
    }
}
