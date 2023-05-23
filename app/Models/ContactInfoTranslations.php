<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfoTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_info_id',
        'language_id',
        'address',
    ];

    public function contact_info()
    {
        return $this->belongsTo(ContactInfo::class, 'contact_info_id');
    }
}
