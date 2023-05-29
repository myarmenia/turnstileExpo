<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

   
    /**
     * relation with RoomMember model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room_users(){
        return $this->hasMany(RoomUsers::class, 'room_id');
    }

    /**
     * relation with message model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(){
        return $this->hasMany(ChatMessage::class, 'room_id');
    }

}
