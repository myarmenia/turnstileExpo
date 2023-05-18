<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $files = [
            'type' => $this->type,
            "path" => route('get-file',['path'=>$this->path])
        ];

        return $files;
    }

    public static function getFirstImage($files){

        foreach ($files as $key => $value) {
           if($value->type == 'image'){
               return $value->path;
           }
        }
    }
}
