@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Register new country') }}</h1></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('country.store')}}" enctype="multipart/form-data">
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
                                    <label for="code_name" class="col-md-4 col-form-label text-md-right">{{ __('Code Name :') }}</label>
                                    <div class="col-md-6">
                                        <input id="code_name" type="text" class="form-control @error('code_name') is-invalid @enderror" name="code_name" value="{{ old('code_name') }}" autocomplete="code_name">
                                        @error('code_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="numeric_code" class="col-md-4 col-form-label text-md-right">{{ __('Code Numeric') }}</label>
                                    <div class="col-md-6">
                                        <input id="numeric_code" type="number" class="form-control @error('numeric_code') is-invalid @enderror" name="numeric_code" value="{{ old('numeric_code') }}" autocomplete="numeric_code" autofocus>
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
                                        <input id="phone_code" type="number" class="form-control @error('phone_code') is-invalid @enderror" name="phone_code" value="{{ old('phone_code') }}" autocomplete="phone_code">

                                        @error('phone_code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="flag" class="col-md-4 col-form-label text-md-right">{{ __('Flag image : ') }}</label>
                                    <div class="col-md-6">
                                        <input id="flag" type="file" class="form-control @error('flag') is-invalid @enderror" name="flag" value="{{ old('flag') }}" autocomplete="flag">
                                        @error('flag')
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

                                        {{ link_to_route('country.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}

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
