<?php

namespace App\Http\Controllers;

use App\Jobs\CheckNetflixAccount;
use App\Methods\ReusableMethods\ReplacementAccountMethod;
use App\ReplacementAccount;
use Illuminate\Http\Request;
use App\Accounts\ReplacementAccountRepository;

class ReplacementAccountController extends Controller
{
    public function getReplacementAccount(Request $request, $category, $codeLink, ReplacementAccountMethod $replacementAccountMethod) {

        $validate = $replacementAccountMethod->validate($codeLink, $category);


        if ($validate != null) {
            return response()->json([
                'error' => $validate
            ]);
        }
        else
        {
            $check = CheckNetflixAccount::dispatch($request->email, $request->password, $category, $codeLink);
            return response()->json($check);

        }



    }

    public function deleteReplacementAccounts(Request $request, ReplacementAccountRepository $replacementAccountRepository) {

         $replacementAccountRepository->delete($request);

        return redirect()->back()->withStatus(__('Sucessfully Deleted! :)'));


    }
}
