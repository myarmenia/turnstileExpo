<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalMonitoringTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'language_id',
        'title',
    ];

    public function regional_manitoring()
    {
        return $this->belongsTo(RegionalMonitoring::class, 'region_id');
    }
}
