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
    <script src="{{ asset('js/paypal-checkout.js') }}" defer></script>
    <script src="{{ asset('js/script.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <script
        src="https://www.paypal.com/sdk/js?client-id=AXeMZPFRsrTB9EtXvmG4tS1ewkQ32VWTCTVlJGMvVRDlAWPPhkVIekqRBpBgiaFyV1SuwbT9G8LZe9zJ"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
</head>
<body>
    <div id="app">
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
                            <a class="nav-link" href="{{ route('lang', ['lang' => 'fr']) }}"><img src="{{ asset('images/flags/16x16/fr.png')}}" title="{{__(trans('home.french')) }}" alt="{{__(trans('home.french')) }}"/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lang', ['lang' => 'en']) }}"><img src="{{ asset('images/flags/16x16/gb.png') }}" title="{{__(trans('home.english')) }}" alt="{{__(trans('home.english')) }}"/></a>
                        </li>
                    </ul>

            </div>
        </nav>
        <div class="container-fluid shadow-lg" id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" id="logo">
                        <img src="{{ asset('images/accessories/logo.png') }}" class="img-logo"/>
                    </div>
                    <div class="offset-md-1 col-md-8" id="menu">
                        <ul class="nav justify-content-end">
                            <li class="nav-item @if(Request::route()->getName() == 'home' or Request::route()->getName() == 'index') active @endif">
                                <a class="nav-link text-menu" href="{{ route('home') }}">
                                    <i class="fas fa-home"></i>{{ __( trans('home.home')) }}
                                </a>
                            </li>
                            <li class="nav-item @if(Request::route()->getName() == 'trans.index' or Request::route()->getName() == 'pull') active @endif">
                                <a class="nav-link text-menu" href="{{ route('trans.index') }}">{{__(trans('home.transaction'))}}</a>
                            </li>
                            <li class="nav-item @if(Request::route()->getName() == 'help') active @endif">
                                <a class="nav-link text-menu" href="{{ route('help') }}">
                                    {{__(trans('home.help'))}}<i class="far fa-question-circle"></i></a>
                            </li>
                            <li class="nav-item @if(Request::route()->getName() == 'contactus') active @endif">
                                <a class="nav-link text-menu" href="{{ route('contactus') }}">{{ __(trans('home.contactus')) }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
        <main>
            @yield('content')
        </main>
        <div class="container-fluid" id="footer">
            <div class="container footer">
                <div class="row">
                    <div class="col-md-4">
                        <h3>{{__(trans('home.options'))}}</h3>
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i>{{ __(trans('home.home')) }}</a></li>
                            <li><a href="{{ route('trans.index') }}"><i class="fas fa-exchange-alt"></i>{{__(trans('home.transaction'))}}</a></li>
                            <li><a href="{{ route('help') }}"><i class="fas fa-question-circle"></i>{{__(trans('home.help'))}}</a></li>
                            <li><a href="{{ route('contactus')}}"><i class="fas fa-envelope"></i>{{__(trans('home.contactus'))}}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>{{__(trans('home.ouroffices'))}}</h3>
                        <ul>
                            @foreach($offices as $office)
                                <li><a href="#">{{ __($office->country)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4 footer-x">
                        <h3>{{__(trans('home.joinus'))}}</h3>
                        <ul class="foot-joinus">
                            <li class="nav-item">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:+25775582939" class="">{{ __(' +257 75-582-939') }}</a>
                            </li>
                            <li class="nav-item">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:+18195933807" class="">{{ __(' +1 819-593-3807') }}</a>
                            </li>
                            <li class="nav-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:contact@worldlypayments.com">{{ __(' contact@worldlypayments.com') }}</a>&nbsp;&nbsp;
                            </li>
                        </ul>
                        <div class="row">
                            <div class="offset-1 col-md-12">
                                <a href="https://facebook.com/"><i class="fab fa-facebook-square"></i></a>

                                <a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-left">
                    <span class="copy">©{{ __(now()->year. ' designed by Net-Telecoms') }}</span>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
