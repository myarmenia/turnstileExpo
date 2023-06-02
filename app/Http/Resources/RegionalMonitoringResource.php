<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionalMonitoringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data =  [
            'id' => $this->id,
            'title' => $this->translation($request->lng_id)->title,
            'image' => route('get-file',['path'=>$this->image_path]),
            "files" => FileResource::collection($this->files),
        ];

        return $data;
    }
}
