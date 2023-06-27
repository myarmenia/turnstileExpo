<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MapRegionInfoResource extends JsonResource
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
            "map_region_id"=>$this->map_region_id,
            "image_path"=> route('get-file',['path'=>$this->image_path]),
            "title"=>$this->translation($request->lng_id)->title,
            "description"=>$this->translation($request->lng_id)->description,
            "files" =>FileResource::collection($this->files)
        ];
    }

}
