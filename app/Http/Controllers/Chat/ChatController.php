<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageEvent;
use App\Events\RealTimeMessage;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Room;
use App\Models\RoomUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        // event(new RealTimeMessage('Hello World'));
        $users = User::where('id', '!=', Auth::id())->where('status', 1)->get();
        return view('chat.index', compact('users'));
    }

    public function check_room($user_id){
        $auth_user_rooms_ids = auth()->user()->room_users()->pluck('room_id');
        $check_room = RoomUsers::where('user_id', $user_id)->whereIn('room_id', $auth_user_rooms_ids)->first();
        if($check_room == null){
            $room = Room::create();
            $room_id = $room->id;
            auth()->user()->room_users()->create([
                'room_id' => $room->id,
            ]);

            RoomUsers::create([
                        'room_id' => $room->id,
                        'user_id' => $user_id
                    ]);
        }
        else{
            $room_id = $check_room->room_id;
        }

        return redirect()->route('room', $room_id);
    }

    public function room(Room $room, $id)
    {
        $user = auth()->user();
        $users = User::where('id', '!=', Auth::id())->where('status', 1)->get();
        $messages = ChatMessage::where('room_id', $id)->get();
        $room = Room::find($id);

        broadcast(new MessageEvent($id))->toOthers();
        return view('chat.room', compact('room', 'messages', 'users'));
    }
}
