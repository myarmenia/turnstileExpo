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
    public $lng_id;
    public function toArray($request)
    {
        $query = null;
        $this->lng_id = $request->lng_id;

         $data =  [
            'id' => $this->id,
            'parent_region_name' => $this->translation($request->lng_id)->name,
            'children' => null,
        ];

        if($this->children()->count() > 0){

            $query = $this->children()->with('region_translations', function($query){
                return $query->where('language_id',  $this->lng_id);
            })->get();

            $query = collect($query)->sortBy('region_translations.name');
            $data['children'] = ChildRegionsResource::collection($query);
        }

            return $data;
    }


}
