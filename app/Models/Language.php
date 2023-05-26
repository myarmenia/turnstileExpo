<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];
    public function news_translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }
    public function region_translations()
    {
        return $this->hasMany(RegionTranslation::class);
    }
    public function region_info_translations()
    {
        return $this->hasMany(RegionInfoTranslation::class);
    }
}
