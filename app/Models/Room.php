<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];


    public function room_users(){
        return $this->hasMany(RoomUsers::class, 'room_id');
    }


    public function messages(){
        return $this->hasMany(ChatMessage::class, 'room_id');
    }

    public function active_user(){
        return $this->room_users->where('user_id', '!=', Auth::id())->first()->user_id;
    }

    // auth user unread_messages
    public function unread_messages(){
        return $this->messages()->where('user_id', '!=', Auth::id())->where('read', 0)->get();
    }

    public function roommate_unread_messages_count(){
        return $this->messages()->where('user_id', Auth::id())->where('read', 0)->get()->count();
    }
}
