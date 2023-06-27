<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapRegionInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'map_region_id',
        'editor_id',
        'image_path',
        'schema_path'

    ];

    public function map_regions()
    {
        return $this->belongsTo(MapRegion::class,'map_region_id');
    }
    public function map_region_info_translations()
    {
        return $this->hasMany(MapRegionInfoTranslation::class);
    }

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function translation($lng_id){
        return $this->hasOne(MapRegionInfoTranslation::class)->where('language_id', $lng_id)->first();
    }



}
