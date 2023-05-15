<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [

        'image',
        'button_link',
        'status'

    ];
    public function news_translations()
    {
        return $this->hasOne(NewsTranslation::class);
    }
}
