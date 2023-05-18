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

        return $data =  [
            'id' => $this->id,
            'title' => $this->translation($request->lng_id)->title,
            'description' => $this->translation($request->lng_id)->description,
            'date' => $this->date,
            'time' => $this->time,
            'logo' => Storage::path($this->logo),
            // 'logo' => Storage::url($this->logo),
            'logo1' => Storage::disk('local')->path($this->logo),
            'logo2' => Storage::disk('local')->url($this->logo),

            // 'logo3' => Storage::get($this->logo),
            // 'logo4' => Storage::disk('local')->path($this->logo),
            // 'logo5' =>File::get($this->logo),

            "files" => FileResource::collection($this->files),
            "links" => LinkResource::collection($this->links),

        ];

    }
}
