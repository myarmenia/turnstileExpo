<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfoLinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_info_id',
        'logo',
        'link',
    ];

    public function contact_info()
    {
        return $this->belongsTo(ContactInfo::class, 'contact_info_id');
    }
}
