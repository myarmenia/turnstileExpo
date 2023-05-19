<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentEarthquake extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_am',
        'title_ru',
        'banner',
        'date',
        'time',
        'description_en',
        'description_am',
        'description_ru',
        'magnitude',
        'editor_id'
    ];


    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function links()
    {
        return $this->morphToMany(Link::class, 'linkable');
    }

    public function current_earthquakes_translations()
    {
        return $this->hasMany(CurrentEarthquakesTranslations::class);
    }

    public function translation($lng_id)
    {
        return $this->hasOne(CurrentEarthquakesTranslations::class)->where('language_id', $lng_id)->first();
    }
}
