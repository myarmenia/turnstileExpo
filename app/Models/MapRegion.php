<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapRegion extends Model
{
    use HasFactory;

    public function map_region_infos()
    {
        return $this->hasOne(MapRegionInfo::class);
    }
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'map_regions_regions','map_region_id','region_id');
    }
}
