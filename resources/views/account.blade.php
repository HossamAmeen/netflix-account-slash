@extends('layouts.master')
@section('content')
{{-- <account-component></account-component> --}}
<div class="container mx-auto mt-5">
    <div class="row">
        <div class="col-sm-12 col-lg-6 col-md-6 mx-auto text-center">
            <div class="card card-account border-dark mb-3">
                <div class="card-header bg-red text-white">Your Netflix Account</div>
                <div class="mt-3 card-body text-dark">
                   
                    <span class="font-weight-bold" >
                        Username/Email:
                    </span>
                    <p class="card-text" >
                        {{ $account->email }}
                    </p>
                    <span class="font-weight-bold" >
                        Password:
                    </span>
                    <p class="card-text" >
                        {{ $account->password }}
                    </p>

                    <span class="font-weight-bold" >
                        Expiration Date:
                    </span>
                    <p class="card-text text-yellow" >
                        {{ $account->expiration_date }}
                    </p>
                   
                    {{-- <div class="d-flex justify-content-center mb-2">
                        <div class="spinner-border main-text-red text-center"  role="status">
                        </div>
                    </div> --}}
                    <!--
                            <p> Website will be undermaintenance until March 28 2018, 11:59pm GMT + 3 </p>
                            <p> We will compensate everyone by adding 3 more days to their expiration date </p>
                            <p> Reason for maintenance: MoxyProxy is down ATM and we are waiting for them to fix their server issue. We do not own moxy and we have spend more than 200$ for alternative proxies but they didnt work</p>
                            <p> We are hoping for everyone understanding. Thank you! </p>
                          -->
                    <button type="submit" class="mb-3 card-text btn bg-red text-white">
                        <a href="{{url('replacement/'.$account->id)}}" style="color: white">
                        Replace my Account
                        </a>
                    </button>
                    <p class="card-text main-text-red"></p>
                    {{-- <p  class="text-info card-text">
                        The website is under maintenance, please check our discord for
                        more information
                    </p> --}}
                    <h5 class="main-font main-text-red">Take Note!</h5>
                    <p class="card-text text-dark">
                        1. Do not change the password or else your warranty will be void
                    </p>
                    <p class="card-text main-text-red">
                        2. DO NOT CLICK THE REPLACE BUTTON IF YOU HAVENT TESTED IT. AND if
                        your account is still working! otherwise the current one u use
                        will be blocked
                    </p>
                    <p class="card-text text-dark">
                        3. We recommend 1 user per 1 link only to prevent getting
                        blocked!!!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection