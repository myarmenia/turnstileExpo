<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentEarthquakesTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_earthquake_id',
        'language_id',
        'title',
        'description'
    ];

    public function current_earthquakes()
    {
        return $this->belongsTo(CurrentEarthquake::class, 'current_earthquakes_id');
    }
}
