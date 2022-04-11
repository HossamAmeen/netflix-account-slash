<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\BulkAccountInsertEvent;
use App\Events\NetflixCheckerEvent;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BulkAccountInsertEvent::class => [
            \App\Listeners\CreateAccountListener::class,
        ],
        NetflixCheckerEvent::class => [
            \App\Listeners\NetflixCheckerListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
