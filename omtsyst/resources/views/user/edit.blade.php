@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Edit User') }}</h1></div>
                    <div class="card-body">
                        {!! Form::model($user[0], ['route' => ['user.update', $user[0]->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user[0]->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user[0]->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user[0]->username }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user[0]->phone_number }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="office" class="col-md-4 col-form-label text-md-right">{{ __('Office') }}</label>

                                <div class="col-md-6">
                                    <select id="office" class="form-control @error('office') is-invalid @enderror" name="office">
                                        <option value="">--Select office--</option>
                                        @foreach($offices as $office)
                                            <option value={{ $office->id }} @if($office->id == $user[0]->office) selected @endif>{{ $office->country . " : " . $office->address }}</option>
                                        @endforeach
                                    </select>
                                    @error('office')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-6">
                                    <select id="admin" class="form-control @error('admin') is-invalid @enderror" name="admin">
                                        <option value="0" @if($user[0]->admin == 0) selected @endif>{{__('Employe')}}</option>
                                        <option value="1" @if($user[0]->admin == 1) selected @endif>{{__('Admin')}}</option>
                                        <option value="2" @if($user[0]->admin == 2) selected @endif>{{__('Super Admin')}}</option>
                                    </select>
                                    @error('admin')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-4 col-md-6">
                                    <input id="uid" type="hidden" name="uid" value="{{ $user[0]->id }}"/>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    {{ link_to_route('user.index', 'Cancel', [], ['class' => 'btn btn-danger']) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
