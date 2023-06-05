<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnreadMessagesCountEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   /**
     * Create a new event instance.
     *
     * @return void
     */

    public $userId;
    public $roomId;
    public $unreadMessageCount;

    public function __construct($userId, $roomId, $unreadMessageCount)
    {
        $this->userId = $userId;
        $this->roomId = $roomId;
        $this->unreadMessageCount = $unreadMessageCount;
    }

     /**
      * Get the channels the event should broadcast on.
      *
      * @return \Illuminate\Broadcasting\Channel|array
      */
    public function broadcastOn()
    {
        return new PrivateChannel('unread_messages_count.'.$this->userId);
    }

    public function broadcastAs()
    {
        return 'unreadMessagesCount';
    }
}
