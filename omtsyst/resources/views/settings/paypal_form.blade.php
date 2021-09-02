@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="navbar-collapse justify-content-center text-light">
                        <h1>{{__('SETTINGS PAYPAL')}}</h1>
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
                    <div class="card-header"><h1>{{ __('Update Paypal Client ID') }}</h1></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.setpaypal')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="client_id" class="col-md-2 col-form-label text-md-right">{{__('Client ID :')}}</label>
                                <div class="col-md-10">
                                    <textarea id="client_id" cols="200" rows="3" class="form-control @error('client_id') is-invalid @enderror" name="client_id" value="{{ old('client_id') }}" required autocomplete="client_id" autofocus>
                                    </textarea>
                                        @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <span class="offset-2 col-md-10">{{ __($client_id) }}</span>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
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
