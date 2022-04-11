@extends('layouts.app', ['title' => __('Netflix Management')])

@section('content')
@include('users.partials.header', ['title' => __('Add Netflix')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Netflix Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/admin/"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                <div class="card-body">
                    <form method="post" action="{{ route('account.store', ['model' => Request::segment(3), 'accountCategory' => Request::segment(4) ]) }}" autocomplete="off">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Netflix Accounts') }}</h6>
                        <div class="pl-lg-4">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Expiration Date</label>
                            <select class="form-control" name="expiration" id="exampleFormControlSelect1">
                            <option value="2">2 Months</option>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                            <option value="1">1 Month</option>
                            </select>
                        </div>

                            <div class="form-group{{ $errors->has('account') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-account">{{ __('Netflix Accounts') }}</label>
                                <textarea
                                    class="form-control form-control-alternative{{ $errors->has('account') ? ' is-invalid' : '' }}"
                                    name="account" id="input-account" rows="12"
                                    placeholder="{{ __('dave@example.com:password') }}"
                                    value="{{ old('account') }}" 
                                    required 
                                    autofocus
                                    ></textarea>
                                @if ($errors->has('account'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('account') }}</strong>
                                </span>
                                @endif
                            </div>

                           <!-- <input type="hidden" name="accountCategory" value="Netflix"> -->


                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection
