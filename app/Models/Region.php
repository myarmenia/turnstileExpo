<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
    ];



    public function region_translations()
    {
        return $this->hasOne(RegionTranslation::class);
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

}
