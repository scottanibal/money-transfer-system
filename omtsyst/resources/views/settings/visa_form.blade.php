@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="navbar-collapse justify-content-center text-light">
                        <h1>{{__('SETTINGS FEES TRANSFER')}}</h1>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        <h4>{{__(Session::get('msg'))}}</h4>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><h1>{{ __('Update VISA Information') }}</h1></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.setvisa')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="bin_country" class="col-md-4 col-form-label text-md-right">{{__('BIN Country :')}}</label>
                                <div class="col-md-4">
                                    <select id="bin_country" class="form-control @error('bin_country') is-invalid @enderror" name="bin_country" value="{{ old('bin_country') }}" required autocomplete="bin_country" autofocus>
                                    <option value="">{{__('Select BIN Country')}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->num }}">{{__($country->name)}}</option>
                                        @endforeach
                                    </select>
                                        @error('bin_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    @foreach($countries as $country)
                                        @if($data[0]['bin_country'] == $country->num)
                                            {{__($country->name)}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="acquiring_bin" class="col-md-4 col-form-label text-md-right">{{__('Acquiring BIN :')}}</label>
                                <div class="col-md-4">
                                    <input id="acquiring_bin" type="text" class="form-control @error('acquiring_bin') is-invalid @enderror" name="acquiring_bin" value="{{ old('acquiring_bin') }}" required>
                                    @error('acquiring_bin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($data[0]['acquiring_bin'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_number" class="col-md-4 col-form-label text-md-right">{{__('Card Number :')}}</label>
                                <div class="col-md-4">
                                    <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required>
                                    @error('account_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($data[0]['account_number'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="expiring_date" class="col-md-4 col-form-label text-md-right">{{__('Exp Date :')}}</label>
                                <div class="col-md-4">
                                    <input id="expiring_date" type="text" class="form-control @error('expiring_date') is-invalid @enderror" placeholder="MM/YY" name="expiring_date" value="{{ old('expiring_date') }}">
                                    @error('expiring_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($data[0]['expiring_date'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rec_country" class="col-md-4 col-form-label text-md-right">{{__('Reception Country :')}}</label>
                                <div class="col-md-4">
                                    <select id="rec_country" class="form-control @error('rec_country') is-invalid @enderror" name="rec_country" value="{{ old('rec_country') }}">
                                        <option value="">{{__('Select Country')}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->num }}">{{__($country->name)}}</option>
                                        @endforeach
                                    </select>
                                        @error('rec_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    @foreach($countries as $country)
                                        @if($data[0]['rec_country'] == $country->num)
                                            {{__($country->name)}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rec_name" class="col-md-4 col-form-label text-md-right">{{__('Name :')}}</label>
                                <div class="col-md-4">
                                    <input id="rec_name" type="text" class="form-control @error('rec_name') is-invalid @enderror" name="rec_name" value="{{ old('rec_name') }}" required>
                                    @error('rec_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($data[0]['rec_name'])}}
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                    {{ link_to_route('admin', 'Cancel', [], ['class' => 'btn btn-danger']) }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
