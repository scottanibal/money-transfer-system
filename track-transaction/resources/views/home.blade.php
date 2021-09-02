@extends('template')
@section('title')
    {{__('Home|track transaction')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4" id="track-form">
                <form method="get" action="{{route('track')}}">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="code" class="col-form-label text-md-right">{{ __('Transaction code :') }}</label>
                        <input id="code" type="text" class="form-control" name="code" autocomplete="code">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email" class="col-form-label text-md-right">{{ __('Email :') }}</label>
                        <input id="email" type="email" class="form-control" name="email" autocomplete="email">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
