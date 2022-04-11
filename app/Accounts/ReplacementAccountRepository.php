<?php

namespace App\Accounts;

use App\ReplacementAccount;
use App\Helpers\Helper;
use Carbon\Carbon;

class ReplacementAccountRepository {

    public function delete($request) {


        $from = date('Y-m-d H:i:s', strtotime($request->from));

        $to = date('Y-m-d H:i:s', strtotime("+23 hours + 59 minutes + 59 seconds",strtotime($request->to)));

        $rAccount = ReplacementAccount::where('created_at', '>=', $from)->where('created_at','<=',$to)->delete();

        return $rAccount;
    }

}