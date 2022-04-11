<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BulkAccountInsertEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $expiration;
    public $account;
    public $accountCategory;
    public $model;

    public function __construct($expiration, $account, $accountCategory, $model)
    {
        $this->expiration = $expiration;
        $this->account = $account;
        $this->accountCategory = $accountCategory;
        $this->model = $model;
    }

}
