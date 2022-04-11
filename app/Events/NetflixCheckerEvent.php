<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NetflixCheckerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    
    private $email;
    private $password;
    private $category;
    private $code_link;

    public function __construct($email, $password, $category, $code_link)
    {
        $this->email = $email;
        $this->password = $password;
        $this->category = $category;
        $this->code_link = $code_link;
    }

}
