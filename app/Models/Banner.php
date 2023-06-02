<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=['path'];

    public function banner_tranlations()
    {
        return $this->hasOne(BannerTranlation::class);
    }


    public function translation($lng_id){
        return $this->hasOne(BannerTranlation::class)->where('language_id', $lng_id)->first();
    }


}
