<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'path',
        'type'
    ];

    public function press_releases()
    {
        return $this->morphedByMany(PressRelease::class, 'fileable');
    }

    public function current_earthquakes()
    {
        return $this->morphedByMany(CurrentEarthquake::class, 'fileable');
    }
}
