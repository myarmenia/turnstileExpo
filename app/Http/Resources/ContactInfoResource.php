<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactInfoResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->translation($request->lng_id)->address,
            'map_iframe' => $this->map_iframe,
            'map_image' => route('get-file',['path'=>$this->map_image]),
            'links' =>  ContactInfoLinksResource::collection($this->contact_info_links)
        ];

        return $data;
    }
}
