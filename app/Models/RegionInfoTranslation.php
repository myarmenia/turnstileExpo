<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionInfoTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'language_id',
        'name'
    ];

    public function region_infos()
    {
        return $this->belongsTo(RegionInfo::class,'region_info_id');
    }

}
