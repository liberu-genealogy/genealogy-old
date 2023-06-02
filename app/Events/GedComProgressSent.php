<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GedComProgressSent extends ShouldBroadcast
{
    public function __construct()
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('getcom-progress');
    }

    public function broadcastWith()
    {
        return [
            'data' => 'key',
        ];
    }
}
// class GedComProgressSent extends \GenealogiaWebsite\LaravelGedcom\Events\GedComProgressSent
// {
// }
