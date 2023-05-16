<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificPublicationsLanguages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sc_publication_id',
        'language_id',
        'content',
    ];

    public function scientific_publication()
    {
        return $this->belongsTo(ScientificPublications::class, 'sc_publication_id');
    }
}
