<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificPublications extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_en',
        'content_am',
        'content_ru',
        "file_path"
    ];

}
