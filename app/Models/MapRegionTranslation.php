<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapRegionTranslation extends Model
{
    use HasFactory;

    protected $fillable=[
        'map_region_id',
        'language_id',
        'title',
        'long_title'
    ];
}
