<?php

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('message.{roomId}', function ($roomId, $message) {

    // $messages = ChatMessage::with('user')->where('room_id', $roomId)->get()->toArray();
    // return [
    //     'user' => Auth::user(),
    //     'messages' => $messages,
    // ];
    return $roomId;
});


Broadcast::channel('unread_messages_count.{userId}', function ($users) {


    return 111;
});

