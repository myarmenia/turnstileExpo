<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
    ];

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function regional_manitoring_translations()
    {
        return $this->hasMany(RegionalMonitoringTranslation::class, 'region_id');
    }

    public function translation($lng_id)
    {
        return $this->hasOne(RegionalMonitoringTranslation::class, 'region_id')->where('language_id', $lng_id)->first();
    }
}
