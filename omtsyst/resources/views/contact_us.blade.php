@extends('layouts.app')
@section('title')
    {{__(trans('home.title').'::'.trans('contactus.page'))}}
@endsection
@section('content')
    <div class="container-fluid" >
        <div class="container" id="contactus-x">
            <div class="row">
                <form method="POST" action="{{ route('post.contactus') }}" class="col-md-8">
                    @csrf
                    <h1 class="col-md-12">{{ __(trans('contactus.title')) }}</h1>
                    @if(Session::has('msg'))
                        <div class="alert alert-success">
                            <h3>{{ Session::get('msg') }}</h3>
                        </div>
                    @endif
                    <div class="form-group col-md-12">
                        <label for="email" class="col-form-label text-md-right">{{ __(trans('contactus.email'). ' *') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="subject" class="col-form-label text-md-right">{{ __(trans('contactus.subject') .' *') }}</label>
                        <select id="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required>
                            <option value="">{{__('-- '.trans('contactus.select_subject').' --')}}</option>
                            <option value="{{ __('Transfer status') }}">{{ __(trans('contactus.transfer_status')) }}</option>
                            <option value="{{ __('Claim') }}">{{ __(trans('contactus.claim')) }}</option>
                            <option value="{{ __('Information') }}">{{ __(trans('contactus.information')) }}</option>
                            <option value="{{ __('Other') }}">{{ __(trans('contactus.other')) }}</option>
                        </select>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="message" class="col-form-label text-md-right">{{ __(trans('contactus.message') . ' *') }}</label>
                        <textarea id="message" rows="10" placeholder="Tap your message here ...." class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required></textarea>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">{{__(trans('contactus.send'))}}</button>
                    </div>
                </form>
                <div class="col-md-4" id="trans-xx">
                    <div class="row" id="office-b">
                        <h3 class="col-md-12">{{__('transaction.ouroffices')}}</h3>
                        <div class="col-md-12">
                            <ul id="office-list">
                                @foreach($offices as $office)
                                    <li class="office-list-item">
                                        <span onclick="showDetailOffice(this)">{{ $office->country }}<i class="fas fa-angle-right"></i></span>
                                        <div>
                                            <span><i class="fas fa-home"></i> {{ $office->address }}</span>
                                            <span><i class="fas fa-phone-alt"></i> {{ $office->phone_number }}</span>
                                            <span><i class="fas fa-envelope"></i> {{$office->email}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
