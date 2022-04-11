<?php

namespace App\Jobs;

use App\AccountCheckers\NetflixChecker;
use App\Events\OnNetflixCheckerProcessed;
use App\Methods\ReusableMethods\ReplacementAccountMethod;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckNetflixAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email;
    private $password;
    private $category;
    private $code_link;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param $password
     * @param $category
     * @param $code_link
     */
    public function __construct($email, $password, $category, $code_link)
    {
        //
        $this->email = $email;
        $this->password = $password;
        $this->category = $category;
        $this->code_link = $code_link;
    }

    /**
     * Execute the job.
     *
     * @param NetflixChecker $netflixChecker
     * @return void
     */
    public function handle(NetflixChecker $netflixChecker)
    {
        broadcast(new OnNetflixCheckerProcessed('Request is being processed, please wait :) if the process took more than 2 minutes please refresh the page and try again!', $this->code_link));

        // $checkAccount = $netflixChecker->checker($this->email, $this->password);

        // if ($checkAccount == 'Valid') {
        //     broadcast(new OnNetflixCheckerProcessed('Sorry! but the account can still be used!', $this->code_link));
        //     return;
          
        // }

        ReplacementAccountMethod::replaceAccount($this->code_link, $this->category, 1);

        broadcast(new OnNetflixCheckerProcessed('The account has been replaced with a new one',  $this->code_link));

        return;

        // do {

        //     if ($checkAccount == 'Invalid') {
        //         $replaced = ReplacementAccountMethod::replaceAccount($this->code_link, $this->category, 1);
        //     }

        //     $checkAccount = $netflixChecker->checker($replaced->email, $replaced->password); 

        // } while($checkAccount == 'Invalid');


        // broadcast(new OnNetflixCheckerProcessed('The account has been replaced with a new one',  $this->code_link));

        // return;
    }
}