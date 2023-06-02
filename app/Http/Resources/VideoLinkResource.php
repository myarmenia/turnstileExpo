<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoLinkResource extends JsonResource
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
            'link' => $this->link,
            'video_iframe' => $this->video_iframe,
            'title' => $this->translation($request->lng_id)->title,
        ];

        return $data;
    }
}
