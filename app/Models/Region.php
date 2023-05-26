<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
    ];



    public function region_translations()
    {
        return $this->hasOne(RegionTranslation::class);
    }


    public function translation($lng_id){
        return $this->hasOne(RegionTranslation::class)->where('language_id', $lng_id)->first();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function map_regions()
    {
        return $this->belongsToMany(MapRegion::class, 'map_regions_regions', 'region_id','map_region_id');
    }


}
