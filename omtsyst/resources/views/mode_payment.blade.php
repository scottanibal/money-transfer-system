@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="tran">
        <div class="container">
            <div class="row mod-pay-x" id="trans-xy">
                <h2 class="col-md-12">{{ __('Transaction details') }}</h2>
            </div>
            <hr>
            <div class="row mod-pay-x">
                <div class="col-md-6 details">
                    <div class="row">
                        <h3 class="col-md-12"><b>{{__('Sender')}}</b></h3>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('First Name')}}</span>
                        <span class="col-md-6">{{__(": ". $request['first_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Last Name')}}</span>
                        <span class="col-md-6">{{__(": ".$request['last_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Phone Number')}}</span>
                        <span class="col-md-6">{{__(': '.$request['phone_number'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Email')}}</span>
                        <span class="col-md-6">{{__(': ' .$request['email'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Address')}}</span>
                        <span class="col-md-6">{{__(': ' .$request['address'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Send money from')}}</span>
                        <span class="col-md-6">{{__(': ' .$from[0]->name)}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h3 class="col-md-12"><b>{{__('Recipient') }}</b></h3>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('First Name')}}</span>
                        <span class="col-md-6">{{__(': '.$request['rec_first_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Last Name')}}</span>
                        <span class="col-md-6">{{__(': '. $request['rec_last_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Phone Number')}}</span>
                        <span class="col-md-6">{{__(': ' . $request['rec_phone_number'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Email ')}}</span>
                        <span class="col-md-6">{{__(': ' . $request['rec_email'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Send money to')}}</span>
                        <span class="col-md-6">{{__(': ' . $to[0]->name)}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Retrait')}}</span>
                        <span class="col-md-6">{{ ($request['withdrawal'] == 0)? ": Office" : ": Mobil service" }}</span>
                    </div>
                </div>
            </div>
            <div class="row mod-pay-x amount">
                <div class="col-md-3 text-primary">
                    <span>{{ __('Total amount : '. $request['amount'].' '. $request['currency']) }}</span>
                </div>
                <div class="col-md-3 text-primary">
                    <span>{{ __('Transfer fees : '. $request['fees_transfer'].' '. $request['currency']) }}</span>
                </div>
                <div class="col-md-5 text-success text-bold">
                    <span>{{ __('Amount to receive : '. $request['to_receive'].' '. $to[0]->alpha_code) }}</span>
                </div>
                <div class="col-md-1">
                    <a href="javascript:history.back()">{{ __('Edit') }}</a>
                </div>
            </div>
            <div class="row" id="mod-pay">
                <div class="col-md-2  offset-md-3">
                    <img class="img-fluid" src="{{ asset('images/accessories/visacard.png')}}" id="visapay" alt="pay with visa" />
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('images/accessories/mastercard.jpg')}}" alt=""/>
                    </a>
                </div>
                <div class="col-md-2">
                    <div id="paypal-button-container">
                        {{--                <a href="#">--}}
                        {{--                    <img class="around img-thumbnail img-fluid" src="{{ asset('images/accessories/paypal.png')}}" alt=""/>--}}
                        {{--                </a>--}}
                    </div>
                </div>
            </div>
            <div class="row mod-pay-y" id="visaform">
                <form method="POST" action="{{ route('visapull')}}" class="offset-md-4 col-md-4" name="form-data">
                    @csrf
                    <div class="offset-4 col-md-8">
                        <input type="hidden" value="{{ $request['first_name'] }}" id="tfirst_name" name="tfirst_name" class="row"/>
                        <input type="hidden" value="{{ $request['last_name'] }}" id="tlast_name" name="tlast_name" class="row"/>
                        <input type="hidden" value="{{ $request['phone_number'] }}" id="tphone_number" name="tphone_number" class="row"/>
                        <input type="hidden" value="{{ $request['email'] }}" id="temail" name="temail" class="row"/>
                        <input type="hidden" value="{{ $request['country_from'].'---' .$request['address'] }}" id="taddress" name="taddress" class="row"/>
                        <input type="hidden" value="{{ $request['rec_first_name'] }}" id="trec_first_name" name="trec_first_name" class="row"/>
                        <input type="hidden" value="{{ $request['rec_last_name'] }}" id="trec_last_name" name="trec_last_name" class="row"/>
                        <input type="hidden" value="{{ $request['rec_phone_number'] }}" id="trec_phone_number" name="trec_phone_number" class="row"/>
                        <input type="hidden" value="{{ $request['rec_email'] }}" id="trec_email" name="trec_email" class="row"/>
                        <input type="hidden" value="{{ $request['country_to'] }}" id="tcountry_to" name="tcountry_to" class="row"/>
                        <input type="hidden" value="{{ $request['amount'] }}" id="tamount" name="tamount" class="row"/>
                        <input type="hidden" value="{{ $request['send_currency'] }}" id="tcurrency" name="tcurrency" class="row" />
                        <input type="hidden" value="{{ $request['currency'] }}" id="currencyname" name="currencyname" class="row" />
                        <input type="hidden" value="{{ $request['fees_transfer'] }}" id="fees" name="fees" class="row" />
                        <input type="hidden" value="{{ $request['to_receive'] }}" id="treceive" name="treceive" class="row" />
                        <input type="hidden" value="{{ $to[0]->alpha_code }}" id="tcurrencyname" name="tcurrencyname" class="row" />
                        <input type="hidden" value="{{ $from[0]['num_code']}}" name="country_code" id="country_code" class="row" />
                        <input type="hidden" value="{{ $request['withdrawal']}}" name="withdrawal" id="withdrawal" class="row" />
                    </div>
                        <div class="form-group row">
                        <label for="card_number" class="col-form-label col-md-4">Card Number :</label>
                        <div class="col-md-8">
                            <input id="card_number" name="card_number" type="text" class="form-control @error('card_number') is_invalide @enderror" value="{{old('card_number')}}" autocomplete="card_number" autofocus/>
                        </div>
                        @error('card_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="expiring_date" class="col-form-label col-md-4">Expiring Date :</label>
                        <div class="col-md-8">
                            <input id="expiring_date" name="expiring_date" type="text" class="form-control @error('expiring_date') is_invalide @enderror" value="{{old('expiring_date')}}" placeholder="MM/YY" />
                        </div>
                        @error('expiring_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="cryptogram" class="col-form-label col-md-4">CVV 3 digits</label>
                        <div class="col-md-8">
                            <input id="cvv" name="cvv" type="text" class="form-control @error('cvv') is_invalide @enderror" value="{{old('cvv')}}"/>
                        </div>
                        @error('cvv')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="cryptogram" class="col-form-label col-md-4"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                {{__('Send')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
