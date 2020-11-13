<?php

namespace App\Http\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KitTime implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $time ;
    public function __construct($time)
    {
            $this->time=$time;

    }
    /**
     * Get the channels the event should broadcast on.
     *f
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
      return new Channel('channel2');
    }
    public function broadcastAs(){
        return 'kit-time';
    }
}
