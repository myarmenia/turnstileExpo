<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'video_iframe',
    ];

    public function video_link_translations()
    {
        return $this->hasMany(VideoLinkTranslation::class);
    }

    public function translation($lng_id)
    {
        return $this->hasOne(VideoLinkTranslation::class)->where('language_id', $lng_id)->first();
    }

}
