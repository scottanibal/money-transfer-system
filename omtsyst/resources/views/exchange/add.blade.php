@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Add new currency') }}</h1></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('exchange.store')}}">
                                @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name : *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                    <input id="alpha_code" type="text" class="form-control @error('alpha_code') is-invalid @enderror" name="alpha_code" value="{{ old('alpha_code') }}" required autocomplete="alpha_code">
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
                                    <input id="numeric_code" type="text" class="form-control @error('numeric_code') is-invalid @enderror" name="numeric_code" value="{{ old('numeric_code') }}" autocomplete="numeric_code">
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
                                    <input id="symbol" type="text" class="form-control @error('symbol') is-invalid @enderror" name="symbol" value="{{ old('symbol') }}" autocomplete="symbol">
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
                                        <option value="0">{{ __('No Active') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
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
                                        {{ __('Save') }}
                                    </button>
                                    {{ link_to_route('exchange.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
