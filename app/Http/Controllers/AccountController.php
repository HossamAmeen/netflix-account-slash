<?php

namespace App\Http\Controllers;

use App\{Account,ReplacementAccount};
use Illuminate\Http\Request;
use Response;
use App\Methods\ReusableMethods\DownloadAccountMethod;
use App\Accounts\AccountRepository;
use App\Events\OnNetflixCheckerProcessed;
use Carbon\Carbon;
class AccountController extends Controller
{


    public function storeAccounts($model, $accountCategory, Request $request, AccountRepository $accountRepository) {


        $accounts = $accountRepository->createAccounts($request, $model, $accountCategory);


        return redirect()->back()->withStatus(__('Your inputs has been successfully Passed to a Job Queue, Please wait .'));

    }

    public function updateAccounts($id, Request $request) {

        $account = Account::findOrFail($id);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $account->created_at);
        $daysToAdd = $request->expiration;
        $date = $date->addMonths($daysToAdd);
        // return $date;
        $account->update(['expiration_date'=>$date]);
        return redirect()->back()->withStatus(__('Your inputs has been successfully Passed to a Job Queue, Please wait .'));
    }

    /**
     * display all netflix accounts
     *
     * @return App\Account
     */
    public function getAll($model, $accountCategory, AccountRepository $accountRepository)
    {
        $accounts = $accountRepository->getAccounts($accountCategory, $model);


        return view('account.index', compact('accounts', $accounts));

    }

    public function search(Request $request, AccountRepository $accountRepository)
    {
        $accounts = $accountRepository->search($request);

        return view('account.index', compact('accounts', $accounts));

    }

    public function disable(Request $request, AccountRepository $accountRepository) {
        $accountRepository->disable($request);

        return redirect()->back()->withStatus(__('The link has been disabled.'));


    }

    public function enable(Request $request, AccountRepository $accountRepository) {
       $accountRepository->enable($request);

        return redirect()->back()->withStatus(__('The link has been enabled.'));
    }


    public function netflixIndex($codeLink, AccountRepository $accountRepository)
    {

        $account = $accountRepository->checkIfAccountIsValid($codeLink);

        if ($account === 404)
        {
            return redirect()->route('404');
        }
        
        return view('account'  ,compact('account',['account_id'=>$account->id]) );
    }

    public function replacement($code)
    {
        $account = Account::where('code_link',$code)->first();
    
        $error_message = null;
        $replace_account = null;
        if ($account->disabled == 1 || $account->expiration_date < Carbon::now() )
        {
            $error_message = "this account is not  available";
        }
        elseif( Carbon::now()->subDays(1)->lte($account->replace_date) ){
            $error_message = "You can't replace account right now, wait 24 hrs" ;
        }
        else{
            $replace_account = ReplacementAccount::where('used', 0)->first();
            // return $replace_account ;
            if($replace_account != null){
                $account->update(['email'=>$replace_account->email,'password'=>$replace_account->password,'replace_date'=>now()]);
                $replace_account->update([ 'account_id'=>$account->id, 'used'=>1, 'category'=>  $account->category]);
    
            }
            else{
                $error_message = "no replace account is available now ";
            }
        }
        // return $error_message ;
        session()->flash('message', $error_message);
        // return session('message'); 
        // return view('account'  ,compact('account',['account_id'=>$account->id]) );
        return view( 'replacement', compact('replace_account','account','error_message') );
    }

    public function netflix($codeLink)
    {

        $account = Account::where('code_link', $codeLink)->first();

        Account::where('id' , $account->id)->update([
            'used' => true
        ]);

        return response()->json([
            'email' => $account->email,
            'password' => $account->password,
            'expiration_date' => $account->expiration_date,
        ]);

    }

    public function download($category, $used, DownloadAccountMethod $downloadAccount)
    {

        $download = $downloadAccount->download($category, $used);


        return Response::make($download['content'], 200, $download['headers']);

    }

    public function downloadReplacement($category, $used, DownloadAccountMethod $downloadReplacement)
    {

        $download = $downloadReplacement->downloadReplacement($category, $used);

        return Response::make($download['content'], 200, $download['headers']);

    }

    public function create() {
        return view('account.create');
    }

    public function edit($id) {
        $account = Account::findOrFail($id);
        return view('account.edit', compact('account'));
    }

}
