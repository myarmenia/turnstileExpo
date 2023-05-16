<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'type',
        'content',
        'status',
        'editor_id',
        'answer_content'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
