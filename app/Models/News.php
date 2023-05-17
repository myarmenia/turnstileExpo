<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'editor_id',
        'image',
        'button_link',
        'status'

    ];
    public function news_translations()
    {
        return $this->hasOne(NewsTranslation::class);
    }
    public function translation($lng_id){
        return $this->hasOne(NewsTranslation::class)->where('language_id', $lng_id)->first();
    }

    public function editor()
    {
    
        return $this->belongsTo(User::class, 'editor_id');
    }
}
