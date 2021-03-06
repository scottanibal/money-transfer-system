@extends('layouts.app')
@section('title')
    {{ __(trans('home.title'). '::home') }}
@endsection
@section('content')
<div class="container-fluid" id="home-x">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/carousel/slide5.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{__('One way to send money')}}</h5>
                        <p>{{__('Powering a faster, better, smarter way to send money, domestically and cross-border')}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/carousel/slide3.jpg') }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{__('One way to send money')}}</h5>
                        <p>{{__('Powering a faster, better, smarter way to send money, domestically and cross-border')}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/carousel/slide6.png') }}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{__('One way to send money')}}</h5>
                        <p>{{__('Powering a faster, better, smarter way to send money, domestically and cross-border')}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/carousel/img2.jpg') }}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{__('One way to send money')}}</h5>
                        <p>{{__('Powering a faster, better, smarter way to send money, domestically and cross-border')}}</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
</div>
@endsection
