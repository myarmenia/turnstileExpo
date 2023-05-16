<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    protected $fillable = [
        'editor_id',
        'banner',
        'date',
        'time',
        'logo',

    ];

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function links()
    {
        return $this->morphToMany(Link::class, 'linkable');
    }

    public function press_release_translations()
    {
        return $this->hasMany(PressReleaseTranslation::class, 'press_release_id');
    }

    public function translation($lng_id){
        return $this->hasOne(PressReleaseTranslation::class)->where('language_id', $lng_id)->first();
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

}
