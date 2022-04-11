<?php

namespace App\Accounts;

use App\Events\BulkAccountInsertEvent;
use App\Account;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\AccountResource;
use App\Helpers\Helper;
use Carbon\Carbon;

class AccountRepository {


    /**
     * get account from accounts_table
     * 
     * @param $url_segment
     * @return App\Account
     */

    public function getAccounts($accountCategory, $model) {

        $class = "App\\".$model;

        $account = $class::where('category', $accountCategory)->orderBy('created_at', 'DESC')->paginate(15);

        return $account;
    }

    public function search($request) {
        
        $account = Account::where('code_link', $request->code_link)->paginate(15);

        return $account;
    }

    public function disable($request) {

        $account = Account::where('id', $request->id)->update([
            'disabled' => 1
        ]);

        return $account;
    }

    public function enable($request) {

        $account = Account::where('id', $request->id)->update([
            'disabled' => 0
        ]);

        return $account;
    }

     /**
     * email:password
     * @param $code_link
     * @return Integer
     */

    public function createAccounts($request, $model, $accountCategory)
    {
       $class = "App\\".$model;
       
       event(new BulkAccountInsertEvent($request->expiration, $request->account, $accountCategory, $class));
       
    }

    public function checkIfAccountIsValid($codeLink) {
        
        $account = Account::where('code_link', $codeLink)->first();

        if (Helper::modelChecker($account) == '404' || $account->disabled == 1 || $account->expiration_date < Carbon::now())
        {
            $account = 404;
        }

        return $account;
    }



}