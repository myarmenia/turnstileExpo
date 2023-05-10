<?php

namespace App\Http\Resources;

use App\Models\File;
use App\Models\Link;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PressReleaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        // dd($this->title);
// $lang = 'ru';
// $l = "title_$lang";
        return $data =  [
            'id' => $this->id,
            'title' => $this->title,
            'description_en' => $this->description_en,

            // 'title_en' => $this->title_en,
            // 'title_am' => $this->title_am,
            // 'title_ru' => $this->title_am,
            // 'description_en' => $this->description_en,
            // 'description_am' => $this->description_am,
            // 'description_ru' => $this->description_am,
            'date' => $this->date,
            'time' => $this->time,
            'logo' => Storage::path($this->logo),
            "files" => FileResource::collection($this->files),
            "links" => LinkResource::collection($this->links),

        ];

    }
}
