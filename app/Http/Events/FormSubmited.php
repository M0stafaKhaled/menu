<?php

namespace App\Http\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FormSubmited implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct()
    {


    }
    /**
     * Get the channels the event should broadcast on.
     *f
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
      return new Channel('channel1');
    }
    public function broadcastAs(){
        return 'form-submit';
    }
}
