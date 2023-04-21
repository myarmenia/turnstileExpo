<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable=[
        'link',
        'type'
    ];

    public function press_releases()
    {
        return $this->morphedByMany(PressRelease::class, 'linkable');
    }

    public function current_earthquakes()
    {
        return $this->morphedByMany(CurrentEarthquake::class, 'linkable');
    }
}
