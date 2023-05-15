<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionInfo extends Model
{
    use HasFactory;

    public function region_infos()
    {
        return $this->hasOne(RegionInfoTranslation::class);
    }

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }
}
