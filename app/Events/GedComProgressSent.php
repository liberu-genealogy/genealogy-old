<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GedComProgressSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $slug;
    public $total;
    public $complete;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($slug, $total, $complete)
    {
        $this->slug = $slug;
        $this->total = $total;
        $this->complete = $complete;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('gedcom-progress');
    }

    public function broadcastAs()
    {
        return 'newMessage';
    }
}
