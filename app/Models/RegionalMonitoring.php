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

    public function regional_manitoring_translations()
    {
        return $this->hasMany(RegionalMonitoringTranslation::class);
    }

    public function translation($lng_id)
    {
        return $this->hasOne(ContactInfoTranslations::class)->where('language_id', $lng_id)->first();
    }
}
