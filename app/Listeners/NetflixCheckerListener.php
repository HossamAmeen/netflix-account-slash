<?php

namespace App\Listeners;

use App\Events\NetflixCheckerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NetflixCheckerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NetflixCheckerEvent  $event
     * @return void
     */
    public function handle(NetflixCheckerEvent $event)
    {
        

        ReplacementAccountMethod::replaceAccount($event->code_link, $event->category);
        broadcast(new OnNetflixCheckerProcessed('The account has been replaced with a new one',  $event->code_link));
    }
}
