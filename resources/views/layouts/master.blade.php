<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AccountsGalore</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tutorial.css') }}" rel="stylesheet">
    <link href="{{ asset('css/support.css') }}" rel="stylesheet">

    <!-- custom js -->
    <script src="{{ asset('js/globalv.js') }}" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://shoppy.gg/api/embed.js"></script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-red ">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::routeIs('explore') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('explore')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!--<li class="nav-item {{ Request::routeIs('tutorial') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('tutorial')}}">Tutorials</a>-->
                    </li>
                    <li class="nav-item {{ Request::routeIs('support') ? 'active' : '' }} ">
                        <a class="nav-link" href="https://discord.gg/T3P9a8G">New Discord / Support</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('support') ? 'active' : '' }} ">
                        <a class="nav-link" href="{{route('pricing')}}">Pricing</a>
                    </li>
                  
                </ul>
            </div>
            </div>
        </nav>

        <div class="">
            @yield('content')
        </div>
    </div>
</body>
</html>
