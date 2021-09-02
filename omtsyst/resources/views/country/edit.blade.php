@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Edit country :' . $country[0]->name)}}</h1></div>
                        <div class="card-body">
                            {!! Form::model($country[0], ['route' => ['country.update', $country[0]->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name : *') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$country[0]->name}}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alpha3" class="col-md-4 col-form-label text-md-right">{{ __('Alpha Code 3 :') }}</label>
                                    <div class="col-md-6">
                                        <input id="alpha3" type="text" class="form-control @error('alpha3') is-invalid @enderror" name="alpha3" value="{{ strtoupper($country[0]->alpha3)}}" autocomplete="alpha3">
                                        @error('alpha3')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alpha2" class="col-md-4 col-form-label text-md-right">{{ __('Alpha Code 2 :') }}</label>
                                    <div class="col-md-6">
                                        <input id="alpha2" type="text" class="form-control @error('alpha2') is-invalid @enderror" name="alpha2" value="{{ strtoupper($country[0]->alpha2)}}" autocomplete="alpha2">
                                        @error('alpha2')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="numeric_code" class="col-md-4 col-form-label text-md-right">{{ __('Code Numeric') }}</label>
                                    <div class="col-md-6">
                                        <input id="numeric_code" type="number" class="form-control @error('numeric_code') is-invalid @enderror" name="numeric_code" value="{{ $country[0]->num }}" autocomplete="numeric_code" autofocus>
                                        @error('numeric_code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_code" class="col-md-4 col-form-label text-md-right">{{ __('Phone Code') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone_code" type="number" class="form-control @error('phone_code') is-invalid @enderror" name="phone_code" value="{{ $country[0]->phone_code }}" autocomplete="phone_code">

                                        @error('phone_code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('Currency :') }}</label>
                                    <div class="col-md-6">
                                        <select id="currency" class="form-control @error('currency') is-invalid @enderror" name="currency">
                                            <option value="">--Select currency--</option>
                                            @foreach($activeCurrencies as $currency)
                                                <option value="{{$currency->id}}" @if($currency->id == $country[0]->currency) selected @endif>{{ $currency->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('currency')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="flag" class="col-md-4 col-form-label text-md-right">{{ __('Flag image : ') }}</label>
                                    <div class="col-md-5">
                                        <input id="flag" type="file" class="form-control @error('flag') is-invalid @enderror" name="flag">
                                        <input id="flag_name" type="hidden" class="form-control" name="flag_name" value="{{ $country[0]->flag }}" />

                                        @error('flag')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div classes="col-md-1">
                                        <img src="{{ asset('images/flags/32x32/' . $country[0]->flag) }}" />
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>

                                        {{ link_to_route('country.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
