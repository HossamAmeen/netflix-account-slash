<?php

namespace App\Http\Controllers;

use App\AccountCheckers\NetflixChecker;
use App\Http\Requests\AccountRequest;
use App\Accounts\AccountRepository;

class NetflixAccountController extends Controller
{
    public function checkAccount(Request $request, NetflixChecker $netflixChecker){

        $checkAccount = $netflixChecker->getAuth($request->email, $request->password);


        dd($checkAccount);
        
        
    }
}
