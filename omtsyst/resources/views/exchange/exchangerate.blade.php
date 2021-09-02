@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="container" id="accordion">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-target="#allcurrencies" href="#allcurrencies">All currencies<span class="sr-only">(current)</span></a>
                                </li>
                                @if(session()->has('role') and session()->get('role') >= 1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="collapse"  data-target="#exchangerate-panel" href="#exchangerate-panel">Exchange rate</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" data-target="#check-exchangerate" href="#check-exchangerate">Convert currency</a>
                                </li>
                            </ul>
                            @if(session()->has('role') and session()->get('role') == 2)
                                <span class="navbar-brand">
                                    {{ link_to_route('exchange.create', 'Add new currency' , [], ['class' => 'btn btn-outline-light']) }}
                                </span>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
            <div class="accordion-group">
                <div class="row collapse show" data-parent="#accordion" id="allcurrencies">
                    <div class="col-md-12">
                        <h1>{{__('All currencies')}}</h1>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('N0')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Symbol')}}</th>
                                <th>{{__('Alpha Code')}}</th>
                                <th>{{__('numeric Code')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Update')}}</th>
                                <th>{{__('Delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currencies as $currency)
                                <tr>
                                    <td>{{ __($currency->id) }}</td>

                                    <td><strong>{{__($currency->name)}}</strong></td>

                                    <td><strong>{{__($currency->symbol)}}</strong></td>

                                    <td class="text-primary"><strong>{{__($currency->alpha_code)}}</strong></td>

                                    <td class="text-primary"><strong>{{__($currency->numeric_code)}}</strong></td>

                                    <td class="text-primary"><strong>{{ ($currency->status == 0)? 'No active' : 'Active'}}</strong></td>
                                    @if(session()->has('role') and session()->get('role') == 2)
                                        <td>{{ link_to_route('exchange.edit', 'Update', [$currency->id], ['class' => 'btn btn-success btn-block'])}}</td>

                                        <td>{{ link_to_route('exchange.destroy', 'Delete', [$currency->id], ['class' => 'btn btn-danger btn-block'])}}</td>
                                    @else
                                        <td>{{ link_to_route('exchange.edit', 'Update', [$currency->id], ['class' => 'btn btn-success btn-block disabled'])}}</td>

                                        <td>{{ link_to_route('exchange.destroy', 'Delete', [$currency->id], ['class' => 'btn btn-danger btn-block disabled'])}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {!! $links !!}
                    </div>
                </div>
                <div class="row collapse justify-content-center" id="exchangerate-panel" data-parent="#accordion">
                    <div class="col-md-8" id="form-calculate-fees">
                        <div class="card">
                            <div class="card-header"><h1>{{ __('Update exchange rate') }}</h1></div>
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <div class="alert alert-success">
                                        <h4>{{__(Session::get('msg'))}}</h4>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('convert') }}">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="currency" class="col-form-label text-md-right">{{ __('Currency (1 unit)') }}</label>
                                        <select id="currency" class="form-control" name="currency" autocomplete="from_currency">
                                            <option value="">{{__('-- ' .trans('transaction.select_currency').' --')}}</option>
                                            @foreach($activeCurrencies as $currency)
                                                <option value={{$currency->alpha_code}}>{{__('1 ' . $currency->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @foreach($activeCurrencies as $currency)
                                    <div class="form-group col-md-12">
                                        <label for="{{$currency->alpha_code}}" class="col-form-label text-md-right">{{ __($currency->name) }}</label>
                                        <input type="number" step="any" name="{{$currency->alpha_code}}" id="{{$currency->alpha_code}}" class="form-control" value="1.0" />
                                    </div>
                                    @endforeach
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="save" id="save">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <span>{{__(' The currency is calculate by unit')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row collapse justify-content-center" id="check-exchangerate" data-parent="#accordion">
                    <div class="col-md-8" id="form-calculate-fees">
                        <div class="card">
                            <div class="card-header"><h1>{{ __('Calculate exchange rate') }}</h1></div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="exchange_amount" class="col-form-label text-md-right">{{ __(trans('transaction.total_amount')) }}</label>
                                    <input id="exchange_amount" onchange="calculate_fees()" type="number" class="form-control" name="exchange_amount" placeholder="0.00" autocomplete="exchange_amount">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="from_currency" class="col-form-label text-md-right">{{ __(trans('transaction.send_currency')) }}</label>
                                    <select id="from_currency" onchange="calculate_fees()" class="form-control" name="from_currency" autocomplete="from_currency">
                                        <option value="">{{__('-- ' .trans('transaction.select_currency').' --')}}</option>
                                        @foreach($activeCurrencies as $currency)
                                            <option value={{$currency->alpha_code .'--' . $currency->symbol}}>{{__($currency->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="to_currency" class="col-form-label text-md-right">{{ __(trans('transaction.receiving_currency')) }}</label>
                                    <select id="to_currency" onchange="calculate_fees()" class="form-control" name="to_currency" autocomplete="to_currency">
                                        <option value="">{{__('-- ' .trans('transaction.select_currency').' --')}}</option>
                                        @foreach($activeCurrencies as $currency)
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
                            <div class="card-footer">
                                <div class="col-md-12" id="result-b">
                                    <span class="col-md-12 result-ex">{{__(trans('transaction.total_amount'))}}<span></span></span>
                                    <span class="col-md-12 result-ex">{{__('transaction.transfer_fees')}}<span></span></span>
                                    <span class="col-md-12 result-ex">{{__('transaction.amount_to_receive')}}<span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
