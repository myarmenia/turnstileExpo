<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'map_iframe',
        'map_image',
    ];

    public function contact_info_links()
    {
        return $this->hasMany(ContactInfoLinks::class);
    }

    public function contact_info_translations()
    {
        return $this->hasMany(ContactInfoTranslations::class);
    }

    public function translation($lng_id)
    {
        return $this->hasOne(ContactInfoTranslations::class)->where('language_id', $lng_id)->first();
    }

}
