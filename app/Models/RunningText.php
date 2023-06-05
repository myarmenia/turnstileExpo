<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningText extends Model
{
    use HasFactory;
    protected $fillable=[
        'language_id',
        'content',
        'link',
    ];

  
    public function translation($lng_id)
    {
        return RunningText::where('language_id', $lng_id)->first();
    }
}
