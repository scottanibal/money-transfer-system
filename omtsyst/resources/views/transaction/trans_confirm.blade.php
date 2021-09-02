@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:5em;margin-bottom:5em;">
                <div class="col-md-8">
                    <div class="card text-center">
                        <div class="card-header">{{ __('Transaction confirm') }}</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('images/accessories/confirm1.gif')}}" alt=""/>
                                </div>
                            </div>
                            <h1>{{ __('Your transaction has been sent successfully!') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
