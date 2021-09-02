<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
    <link rel="icon" type="image/ico" href="{{ asset('images/accessories/icon.png') }}" />

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
</head>
<body>
<div id="app">
{{--    <nav class="navbar navbar-inverse">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="navbar-header">--}}
{{--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                </button>--}}
{{--                <a class="navbar-brand" href="{{ route('home') }}">{{__('Track transaction')}}</a>--}}
{{--            </div>--}}
{{--            <div class="collapse navbar-collapse" id="myNavbar">--}}
{{--                <ul class="nav navbar-nav">--}}
{{--                    <li class="active"><a href="#">Home</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Page 1-1</a></li>--}}
{{--                            <li><a href="#">Page 1-2</a></li>--}}
{{--                            <li><a href="#">Page 1-3</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="#">Page 2</a></li>--}}
{{--                    <li><a href="#">Page 3</a></li>--}}
{{--                </ul>--}}
{{--                <ul class="nav navbar-nav navbar-right">--}}
{{--                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>--}}
{{--                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto top-1" id="top-1">
                <li class="nav-item">
                    <i class="fas fa-phone-alt text-black-50"></i>
                    <a href="tel:+25775582939" class="">{{ __('+257 75-582-939') }}</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-phone-alt text-black-50"></i>
                    <a href="tel:+18195933807" class="">{{ __('+1 819-593-3807') }}</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-envelope text-black-50"></i>
                    <a href="mailto:contact@worldlypayments.com">{{ __('contact@worldlypayments.com') }}</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/flags/16x16/fr.png')}}" title="{{__(trans('home.french')) }}" alt="{{__(trans('home.french')) }}"/></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/flags/16x16/gb.png') }}" title="{{__(trans('home.english')) }}" alt="{{__(trans('home.english')) }}"/></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid shadow-lg" id="top-bar">
        <div class="container">
            <div class="row">
                <div class="d-none d-sm-none d-md-block col-md-3" id="logo">
                    <img src="{{ asset('images/accessories/logo.png') }}" class="img-logo"/>
                </div>
                <div class="col-12 offset-md-1 col-md-8" id="menu">
                    <ul class="nav justify-content-end">
                        <li class="nav-item @if(Request::route()->getName() == 'home') active @endif">
                            <a class="nav-link text-menu" href="{{ route('home') }}">
                                <i class="fas fa-home"></i>{{ __(' Home') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
