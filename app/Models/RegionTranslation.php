<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{
    use HasFactory;
    
    public function regions()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
}
