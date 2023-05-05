<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_am',
        'title_ru',
        'description_en',
        'description_am',
        'description_ru',
        'image',
        'button_link',
        'button_text_en',
        'button_text_am',
        'button_text_ru',
    ];
}
