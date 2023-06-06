<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,  HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'second_name',
        'email',
        'password',
        'status'
    ];

    public function press_releases()
    {
        return $this->hasMany(PressRelease::class);
    }

    public function isAdmin()
    {


        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'Admin') {
                return true;
            }
        }

        return false;
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedbacks::class);
    }

    public function room_users(){
        return $this->hasMany(RoomUsers::class);
    }

    public function messages(){
        return $this->hasMany(ChatMessage::class);
    }
    
    // written_new_messages_count for auth user by roommate
    public function written_new_messages_count(){
        return $this->messages()->where('to_user_id', Auth::id())->where('read', 0)->get()->count();
    }

    public function all_unread_messages(){

        return ChatMessage::where(['to_user_id'=> Auth::id(),'read'=> 0])->with('user.roles')->orderBy('id', 'DESC')->get();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
