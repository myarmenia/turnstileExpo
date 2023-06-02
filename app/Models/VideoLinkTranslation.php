<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLinkTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_link_id',
        'language_id',
        'title'
    ];
}
