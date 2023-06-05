<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerTranlation extends Model
{
    use HasFactory;
    protected $fillable=[
        'banner_id',
        'language_id',
        'content',
    ];

    public function banners()
    {
        return $this->belongsTo(Banner::class,'banner_id');
    }
    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }
}
