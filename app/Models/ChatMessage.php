<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_user_id',
        'room_id',
        'content',
        'file',
        'read'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->ago();
    }

    public function getTime()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }
}
