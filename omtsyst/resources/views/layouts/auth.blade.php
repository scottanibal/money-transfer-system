<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/ico" href="{{ asset('images/accessories/icon.png') }}" />

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js')}}" defer></script>
    <script src="{{ asset('js/package/dist/Chart.js')}}" />
    <script src="{{ asset('js/mdb.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_admin.css') }}" rel="stylesheet">
    <link href="{{ asset('js/package/dist/Chart.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="top-1">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ __('Admin System')}}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    {{ link_to_route('user.show', 'My Profile', [Auth::user()->id], ['class' => 'dropdown-item'])}}
                                   
                                    {{ link_to_route('change.password', 'Change password', [], ['class' => 'dropdown-item'])}}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid top-x shadow-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ url('/home') }}">
                            <img src="{{ asset('images/accessories/logo.png')}}" alt="" class="logo"/>
                        </a>
                    </div>
                    @auth
                        <div class="col-md-10" id="menu">
                            <ul class="nav justify-content-end">
                                @if(session()->has('role') and session()->get('role') >= 1)
                                    <li class="nav-item">
                                        <a class="nav-link text-menu" href="{{ route('user.index') }}">{{ __('Users') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-menu" href="{{ route('office.index') }}">{{__('Offices')}}</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link text-menu" href="{{ route('transact.index') }}">{{__('Transactions')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-menu" href="{{ route('exchange.index') }}">{{__('Exchange rate')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-menu" href="{{ route('country.index') }}">{{__('Country')}}</a>
                                </li>
                                    @if(session()->has('role') and session()->get('role') >= 1)
                                    <li class="nav-item dropdown">
                                        <a id="settingsDropdown" class="nav-link text-menu dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{__('Settings')}}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="settingsDropdown">
                                            <a class="dropdown-item" href="{{ route('setfees') }}">{{ __('Fees transfer') }}</a>
                                            <a class="dropdown-item" href="{{ route('setvisa') }}">{{ __('Visa information') }}</a>
                                            <a class="dropdown-item" href="{{ route('setpaypal') }}">{{__('Paypal information')}}</a>
                                        </div>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                        @endauth
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/mdb.js')}}"></script>
</body>
</html>
