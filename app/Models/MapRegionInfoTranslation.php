<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapRegionInfoTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_region_info_id',
        'language_id',
        'title',
        'description'
    ];


    public function map_region_infos()
    {
        return $this->belongsTo(MapRegionInfo::class,'map_region_id');
    }
    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }



}
