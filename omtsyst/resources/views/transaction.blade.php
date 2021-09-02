@extends('layouts.app')
@section('title')
    {{ __(trans('home.title') . '|transaction')  }}
@endsection
@section('content')
    <div class="container-fluid" id="trans-x">
        <div class="container">
        <div class="row">
            <div class="col-md-8" id="trans-xy">
                <h2>{{__(trans('transaction.title'))}}</h2>
                <form method="POST" action="{{ route('pull') }}">
                    @csrf
                    <h4 class="col-md-12">{{__(trans('transaction.sender'))}}</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name" class="col-form-label text-md-right">{{ __(trans('transaction.first_name') . ' *') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" class="col-form-label text-md-right">{{ __(trans('transaction.last_name') . ' *') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone_number" class="col-form-label text-md-right">{{ __(trans('transaction.phone_number') . ' *') }}</label>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" required name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus>
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label text-md-right">{{ __(trans('transaction.email'). ' *') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <label for="address" class="col-form-label text-md-right">{{ __(trans('transaction.address'). ' *') }}</label>
                        <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required value="{{ old('address') }}" autocomplete="address" autofocus> </textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </div>
                    </div>
                    <br>
                    <h4 class="col-md-12">{{__(trans('transaction.recipient'))}}</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rec_first_name" class="col-form-label text-md-right">{{ __(trans('transaction.first_name') . '*') }}</label>
                            <input id="rec_first_name" type="text" class="form-control @error('rec_first_name') is-invalid @enderror" required name="rec_first_name" value="{{ old('rec_first_name') }}" autocomplete="rec_first_name" autofocus>
                            @error('rec_first_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rec_last_name" class="col-form-label text-md-right">{{ __(trans('transaction.last_name') .' *') }}</label>
                            <input id="rec_last_name" type="text" class="form-control @error('rec_last_name') is-invalid @enderror" required name="rec_last_name" value="{{ old('rec_last_name') }}" autocomplete="rec_last_name" autofocus>
                            @error('rec_last_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="rec_phone_number" class="col-form-label text-md-right">{{ __(trans('transaction.phone_number'). ' *') }}</label>
                            <input id="rec_phone_number" type="text" class="form-control @error('rec_phone_number') is-invalid @enderror" required name="rec_phone_number" value="{{ old('rec_phone_number') }}" autocomplete="rec_phone_number" autofocus>
                            @error('rec_phone_number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rec_email" class="col-form-label text-md-right">{{ __(trans('transaction.email')) }}</label>
                            <input id="rec_email" type="email" class="form-control @error('email') is-invalid @enderror" name="rec_email" value="{{ old('rec_email') }}" autocomplete="rec_email">
                            @error('rec_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="col-md-12">{{ __(trans('transaction.other_info')) }}</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="country_from" class="col-form-label text-md-right">{{ __(trans('transaction.from')) }}</label>
                            <select id="country_from" class="selectpicker form-control @error('country_from') is-invalid @enderror" required name="country_from" value="{{ old('country_from') }}" autocomplete="country_from">
                                <option value="">{{__('-- ' . trans('transaction.select_country') . ' --')}}</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country_to" class="col-form-label text-md-right">{{ __(trans('transaction.to')) }}</label>
                            <select id="country_to" class="form-control @error('country_to') is-invalid @enderror" required name="country_to" value="{{ old('country_to') }}" autocomplete="country_to">
                                <option value="">{{__('-- '.trans('transaction.select_country'). ' --')}}</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_to')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="send_currency" class="col-form-label text-md-right">{{ __(trans('transaction.send_currency'). ' *') }}</label>
                            <select id="send_currency" class="form-control @error('send_currency') is-invalid @enderror" required name="send_currency" value="{{ old('send_currency') }}" autocomplete="send_currency">
                                <option value="">{{__('-- '.trans('transaction.select_currency'). ' --')}}</option>
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->id}}">{{__($currency->name)}}</option>
                                @endforeach
                            </select>
                            @error('send_currency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount" class="col-form-label text-md-right">{{ __(trans('transaction.total_amount'). ' *') }}</label>
                            <input id="amount" type="number" step="any" placeholder="1000" class="form-control @error('amount') is-invalid @enderror" required name="amount" value="{{ old('amount') }}" autocomplete="amount">
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" name="withdrawal" id="withdrawal" class="form-check-input @error('withdrawal') is-invalid @enderror" value="{{old('withdrawal')}}" />
                                <label for="withdrawal" class="form-check-label">
                                    {{__(trans('transaction.withdrawal_mode'))}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="send">
                                {{ __(trans('transaction.mode_payment')) }}
                            </button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-4" id="trans-xx">
                <div class="row trans-xxy">
                    <h3 class="col-md-12">{{__(trans('transaction.calculate_fees'))}}</h3>
                    <div class="col-md-12" id="form-calculate-fees">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="exchange_amount" class="col-form-label text-md-right">{{ __(trans('transaction.total_amount')) }}</label>
                            <input id="exchange_amount" onchange="calculate_fees()" type="number" class="form-control" name="exchange_amount" placeholder="0.00" autocomplete="exchange_amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="from_currency" class="col-form-label text-md-right">{{ __(trans('transaction.send_currency')) }}</label>
                            <select id="from_currency" onchange="calculate_fees()" class="form-control" name="from_currency" autocomplete="from_currency">
                                <option value="">{{__('-- ' .trans('transaction.select_currency').' --')}}</option>
                                @foreach($currencies as $currency)
                                    <option value={{$currency->alpha_code .'--' . $currency->symbol}}>{{__($currency->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to_currency" class="col-form-label text-md-right">{{ __(trans('transaction.receiving_currency')) }}</label>
                            <select id="to_currency" onchange="calculate_fees()" class="form-control" name="to_currency" autocomplete="to_currency">
                                <option value="">{{__('-- ' .trans('transaction.select_currency').' --')}}</option>
                                @foreach($currencies as $currency)
                                    <option value={{$currency->alpha_code .'--'. $currency->symbol}}>{{__($currency->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="button"  onclick="calculate_fees()" class="btn btn-primary" name="calculate" id="calculate">
                                {{ __(trans('transaction.calculate')) }}
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12" id="result-b">
                        <hr>
                        <span class="col-md-12 result-ex">{{__(trans('transaction.total_amount'))}}<span></span></span>
                        <span class="col-md-12 result-ex">{{__(trans('transaction.transfer_fees'))}}<span></span></span>
                        <span class="col-md-12 result-ex">{{__(trans('transaction.amount_to_receive'))}}<span></span></span>
                    </div>
                </div>
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
