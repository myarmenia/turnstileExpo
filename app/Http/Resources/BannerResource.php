<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
                'content' => $this->translation($request->lng_id)->content,
                'path' => route('get-file',['path'=>$this->path]),


            ];

    }
}
