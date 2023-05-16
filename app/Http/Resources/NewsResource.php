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
            'title' => $this->translation($request->lng_id)->title,
            'description' => $this->translation($request->lng_id)->description,
            'image' => Storage::path($this->image),
            'button_text' => $this->translation($request->lng_id)->button,
            "button_link" => $this->button_link,
            "status" => $this->status,
        ];
    }
}
