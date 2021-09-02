@extends('layouts.app')
@section('title')
    {{__(trans('home.title').'::'.trans('help.page'))}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container" id="help-x">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <h1 class="col-md-12">{{__(trans('help.title'))}}</h1>
                    </div>
                    <div class="row" style="padding-right: 8px;">

                        <h2 class="col-md-12">{{__(trans('help.title1'))}}</h2>
                        <hr class="col-md-12">
                        <p class="col-md-12">
                            {{__(trans('help.title1_text')) }}
                            <ol>
                                <li>
                                    <span class="step">{{__(trans('help.exchangerate'))}}</span>
                                    <p>{{__(trans('help.exchangerate_text'))}}
                                    </p>
                                </li>
                                <li>
                                    <span class="step">{{__(trans('help.filltransactionform'))}}</span>
                                    <p>
                                        {{__(trans('help.filltransactionform_text'))}}
                                    </p>
                                </li>
                                <li>
                                    <span class="step">{{__(trans('help.choosemodepayment'))}}</span>
                                    <p>
                                        {{__(trans('help.choosemodepayment_text'))}}
                                    </p>
                                </li>
                            </ol>
                        </p>
                    </div>
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
