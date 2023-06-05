<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SmartSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $arr = ['press_release', 'current_earthquake', 'news', 'map_region_info'];

        $data =  [
            'title' => $this['title'],
            'description' => $this['description'],
        ];

        foreach ($arr as $key => $value) {
            if(isset($this[$value.'_id'])) {
                $data['id'] = $this[$value.'_id'];
                $data['type'] = $value;
            }
        }

        return $data;
    }
}
