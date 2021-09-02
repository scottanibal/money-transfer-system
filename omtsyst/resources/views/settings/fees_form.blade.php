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
            <div class="col-md-8">
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        <h4>{{__(Session::get('msg'))}}</h4>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><h1>{{ __('Update fees transfer') }}</h1></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.setfees')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="1" class="col-md-4 col-form-label text-md-right">{{__('1 - 100 $ :')}}</label>
                                <div class="col-md-4">
                                    <input id="1" type="number" step="any" class="form-control @error('1') is-invalid @enderror" name="1" value="{{ old('1') }}" required autocomplete="1" autofocus>
                                    @error('1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{ __($fees[0]['1']. " %") }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="101" class="col-md-4 col-form-label text-md-right">{{__('101 - 500 $ :')}}</label>
                                <div class="col-md-4">
                                    <input id="101" type="number" step="any" class="form-control @error('101') is-invalid @enderror" name="101" value="{{ old('101') }}" required autofocus>
                                    @error('101')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($fees[0]["101"]." %")}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="501" class="col-md-4 col-form-label text-md-right">{{__('501 - 1000 $ :')}}</label>
                                <div class="col-md-4">
                                    <input id="501" type="number" step="any" class="form-control @error('501') is-invalid @enderror" name="501" value="{{ old('501') }}" required autofocus>
                                    @error('501')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($fees[0]["501"]." %")}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="1001" class="col-md-4 col-form-label text-md-right">{{__('1001 - 5000 $ :')}}</label>
                                <div class="col-md-4">
                                    <input id="1001" type="number" step="any" class="form-control @error('1001') is-invalid @enderror" name="1001" value="{{ old('1001') }}" required>
                                    @error('1001')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($fees[0]["1001"]." %")}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="5001" class="col-md-4 col-form-label text-md-right">{{__('5001 - 10000 $ :')}}</label>
                                <div class="col-md-4">
                                    <input id="5001" type="number" step="any" class="form-control @error('5001') is-invalid @enderror" name="5001" value="{{ old('5001') }}" required>
                                    @error('5001')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($fees[0]["5001"]." %")}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="10000" class="col-md-4 col-form-label text-md-right">{{__('10000$ > :')}}</label>
                                <div class="col-md-4">
                                    <input id="10000" type="number" step="any" class="form-control @error('10000') is-invalid @enderror" name="10000" value="{{ old('10000') }}" required>
                                    @error('10000')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    {{__($fees[0]["10000"]." %")}}
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
