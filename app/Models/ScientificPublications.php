<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificPublications extends Model
{
    use HasFactory;

    protected $fillable = [
        "file_path"
    ];

    public function scientific_publication_languages()
    {
        return $this->hasMany(ScientificPublicationsLanguages::class, 'sc_publication_id');
    }
}
