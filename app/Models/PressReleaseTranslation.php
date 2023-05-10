<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressReleaseTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'press_release_id',
        'language_id',
        'title',
        'description'
    ];

    public function press_release(){
        return $this->belongsTo(PressRelease::class, 'press_release_id');
    }

}
