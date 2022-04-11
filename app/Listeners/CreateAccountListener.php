<?php

namespace App\Listeners;


use Ramsey\Uuid\Uuid;
use App\Account;
use App\Events\BulkAccountInsertEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class CreateAccountListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  BulkAccountInsertEvent  $event
     * @return void
     */
    public function handle(BulkAccountInsertEvent $event)
    {
        $lines = preg_split('/\r\n|\n|\r/', trim($event->account), -1, PREG_SPLIT_NO_EMPTY);


        $now = Carbon::now();

        $now->addDays(5);  

        $expirationdate = $now->addMonths($event->expiration);  
        
        $category = $event->accountCategory;


        foreach ($lines as $key => $value) {
            
            $account = explode(":", $value);

            if (count($account) != 2) {
                continue;
            }
            $event->model::create([
                'email' => $account[0],
                'password' => $account[1],
                'code_link' => Uuid::uuid4(),
                'expiration_date' => $expirationdate,
                'used' => false,
                'category' => $category
            ]);
        }
       
    }
}
