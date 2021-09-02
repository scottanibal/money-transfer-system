@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Update Currency information') }}</h1></div>
                        <div class="card-body">
                            {!! Form::model($currency[0], ['route' => ['exchange.update', $currency[0]->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name : *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $currency[0]->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alpha_code" class="col-md-4 col-form-label text-md-right">{{ __('Alpha Code : *') }}</label>
                                <div class="col-md-6">
                                    <input id="alpha_code" type="text" class="form-control @error('alpha_code') is-invalid @enderror" name="alpha_code" value="{{ $currency[0]->alpha_code }}" required autocomplete="alpha_code">
                                    @error('alpha_code')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numeric_code" class="col-md-4 col-form-label text-md-right">{{ __('Numeric Code :') }}</label>
                                <div class="col-md-6">
                                    <input id="numeric_code" type="text" class="form-control @error('numeric_code') is-invalid @enderror" name="numeric_code" value="{{ $currency[0]->numeric_code }}" autocomplete="numeric_code">
                                    @error('numeric_code')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="symbol" class="col-md-4 col-form-label text-md-right">{{ __('Symbol :') }}</label>
                                <div class="col-md-6">
                                    <input id="symbol" type="text" class="form-control @error('symbol') is-invalid @enderror" name="symbol" value="{{ $currency[0]->symbol }}" autocomplete="symbol">
                                    @error('numeric_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status :') }}</label>
                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="">--Select status--</option>
                                        <option value="0" @if($currency[0]->status == 0) selected @endif>{{ __('No Active') }}</option>
                                        <option value="1" @if($currency[0]->status == 1) selected @endif>{{ __('Active') }}</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Apply') }}
                                    </button>
                                    {{ link_to_route('exchange.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}
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
