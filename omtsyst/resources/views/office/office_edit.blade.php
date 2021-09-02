@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Update office information') }}</h1></div>
                        <div class="card-body">
                            {!! Form::model($office[0], ['route' => ['office.update', $office[0]->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

                            <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address : *') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $office[0]->address }}" required autocomplete="address" autofocus>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail : *') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $office[0]->email }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $office[0]->phone_number  }}" required autocomplete="phone_number" autofocus>
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                    <div class="col-md-6">
                                        <select id="country" class="form-control @error('country') is-invalid @enderror" name="country">
                                            <option value="">--Select country--</option>
                                            @foreach($countries as $country)
                                                <option value={{ $country->id }} @if($office[0]->id_country == $country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
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
                                        {{ link_to_route('office.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}
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
