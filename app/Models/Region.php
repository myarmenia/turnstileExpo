<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_am',
        'name_ru',
        'number'

    ];


    public function countries(){
        return $this->hasMany(Country::class);
    }

}
