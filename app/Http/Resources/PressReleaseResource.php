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
        
        $data =  [
            'id' => $this->id,
            'title' => $this->translation($request->lng_id)->title,
            'description' => $this->translation($request->lng_id)->description,
            'date' => $this->date,
            'time' => $this->time,
            'logo' => route('get-file',['path'=>$this->logo])
        ];

        $data['image'] = route('get-file',['path'=>FileResource::getFirstImage($this->files)]);

        return $data;
    }


}
