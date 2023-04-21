<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'name_en',
        'name_am',
        'name_ru',

    ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }


}
