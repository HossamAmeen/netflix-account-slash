<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OnNetflixCheckerProcessed implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels, Dispatchable;

    public $message;
    public $codeLink;
    
    public function __construct($message, $codeLink)
    {
        $this->message = $message;
        $this->codeLink = $codeLink;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->codeLink);
    }

}
