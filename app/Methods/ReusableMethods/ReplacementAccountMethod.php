<?php
namespace App\Methods\ReusableMethods;

use App\ReplacementAccount;
use App\Account;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Crypt;

class ReplacementAccountMethod
{

    private static $account;
    private static $newAccount;

     /* i have to improve this messsy code */

    public function validate($code_link, $category) {

        $err = null;

        //code link is invalid
        self::$account = Account::where('category', $category)->where('code_link', $code_link)->first();

        if(empty(self::$account))
        {
             $err = 'Account invalid';
             return $err;
        }

        self::$newAccount = ReplacementAccount::where('account_id', null)->orderBy('created_at', 'asc')->first();

        //if new account is empty
        if(empty(self::$newAccount) )
        {
            $err = 'There is no replacement account available, please try again later';
            return $err;

        }

        $countReplacedAccountsToday = ReplacementAccount::where('account_id', self::$account->id)->whereDate('updated_at', '=', Carbon::today()->toDateString())->count();
         //2 replacement account per day per user
        if ($countReplacedAccountsToday >= 4) {
            $err = 'Daily limit of 4 only, chat us for help or wait for '. Carbon::tomorrow()->diffForHumans() .' till reset!';
        } 

        return $err;

    }


    public static function replaceAccount($code_link, $category, $forceValidate)
    {

        if ($forceValidate = 1) {
        $validate = (new self)->validate($code_link, $category);

        if ($validate != null)
        {
            return [
                'error' => $validate
            ];
        }
        }

        //set user claim to the replacement account
        ReplacementAccount::where('id', self::$newAccount->id)->update([
            'account_id' => self::$account->id,
            'used' => true
        ]);

        Account::where('id', self::$account->id)->update([
            'email' => self::$newAccount->email,
            'password' => Crypt::encrypt(self::$newAccount->password)
        ]);


        return self::$newAccount;

    }






}