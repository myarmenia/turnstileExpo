<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AllUnreadMessagesEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roommateId;
    public $allUnreadMessages;

    public function __construct($roommateId, $allUnreadMessages)
    {
        $this->roommateId = $roommateId;
        $this->allUnreadMessages = $allUnreadMessages;
    }

     /**
      * Get the channels the event should broadcast on.
      *
      * @return \Illuminate\Broadcasting\Channel|array
      */
    public function broadcastOn()
    {
        return new PrivateChannel('all_unread_messages.'.$this->roommateId);
    }

    public function broadcastAs()
    {
        return 'allUnreadMessages';
    }
}
