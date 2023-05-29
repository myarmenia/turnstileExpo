<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GlobalMonitoringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
;
         return  [
            'id' => $this->id,
            'parent_region_name' => $this->translation($request->lng_id)->name,

            'children'=>$this->children()->count()>0 ? ChildRegionsResource::collection($this->children) : null,

        ];


    }
   

}
