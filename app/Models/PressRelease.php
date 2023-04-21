<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_am',
        'title_ru',
        'banner',
        'date',
        'time',
        'logo',
        'description_en',
        'description_am',
        'description_ru'

    ];

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function links()
    {
        return $this->morphToMany(Link::class, 'linkable');
    }
}
