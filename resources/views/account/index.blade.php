@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h3 class="mb-0">{{ __('Netflix') }}</h3>
                        </div>
                        <div class="col-9 text-right">
                            <a href="{{ route('netflix.downloadReplacement', ['category' => 'netflix', 'used' => 0]) }}"
                                class="btn btn-sm btn-primary">{{ __('Download UNUSED Replacement Accounts') }}</a>
                            <a href="{{ route('netflix.download', ['category' => 'netflix', 'used' => 0]) }}"
                                class="btn btn-sm btn-primary">{{ __('Download UNUSED Accounts') }}</a>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#modal-form">Delete Replacement Account</button>

                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#search">Search</button>



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

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Password') }}</th>
                                <th scope="col">{{ __('Code Link') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                            <tr>
                                <td>
                                    @if ($account->used == 0)
                                    <a href="#">{{ $account->email }}</a>
                                    @else
                                    <a class="text-danger">{{ $account->email }}</a>
                                    @endif

                                </td>

                                <td>
                                    {{ $account->password }}
                                </td>
                                <td><a
                                        href="{{ url('/')}}/netflix/{{$account->code_link}}">{{ $account->code_link }}</a>
                                </td>
                                <td>{{ $account->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                @if ($account->disabled == 0)
                                <form method="post" action="{{ route('a.disable') }}" autocomplete="off">
                                    @csrf
                                  
                              
                                            <input name="id" class="form-control" 
                                                type="hidden" value="{{ $account->id }}" >

                                    <div class="">
                                        <button type="submit" class="btn btn-danger my-4">Disable</button>
                                    </div>
                                </form>
                                @else
                                <form method="post" action="{{ route('a.enable') }}" autocomplete="off">
                                    @csrf
                                  
                              
                                            <input name="id" class="form-control" 
                                                type="hidden" value="{{ $account->id }}" >

                                    <div class="">
                                        <button type="submit" class="btn btn-primary my-4">Enable</button>
                                    </div>
                                </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $accounts->links() }}
                    </nav>
                </div>
            </div>
        </div>

        <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="modal-form-search"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">


                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Find Code link</small>
                                </div>
                                <form method="get" action="{{ route('a.search') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group mb-3">

                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="code_link" class="form-control" placeholder="Paste Code link"
                                                type="text" >
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger my-4">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">


                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Delete Replacement Accounts</small>
                                </div>
                                <form method="post" action="{{ route('ra.delete') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group mb-3">
                                        From:

                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="from" class="form-control datepicker" placeholder="Select date"
                                                type="text" value="06/20/2018">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        To:
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="to" class="form-control datepicker" placeholder="Select date"
                                                type="text" value="06/20/2018">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger my-4">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('layouts.footers.auth')
</div>
@endsection
