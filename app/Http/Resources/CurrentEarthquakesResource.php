<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CurrentEarthquakesResource extends JsonResource
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
            'date' => $this->date,
            'time' => $this->time,
            'description_en' => $this->description_en,
            'description_am' => $this->description_am,
            'description_ru' => $this->description_am,
            "files" => FileResource::collection($this->files),
            "links" => LinkResource::collection($this->links),

        ];
    }
}
