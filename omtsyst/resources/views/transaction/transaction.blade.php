@extends('layouts.auth')
@section('title')
   {{ __('Recent transactions') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="navbar-collapse text-light" id="navbarText">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{__('Recent transactions')}}</h3>
                            </div>
                            <ul class="navbar-nav mr-auto">

                            </ul>
                            <nav class="navbar navbar-light">
                                <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Code transaction" aria-label="Search">
                                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('Ref')}}</th>
                                    <th>{{__('Sender')}}</th>
                                    <th>{{__('Country From')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Recipient')}}</th>
                                    <th>{{__('Send date')}}</th>
                                    <th>{{__('Mode')}}</th>
                                    <th>{{__('Withdrawal')}}</th>
                                    <th>{{__('View')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ __($transaction->id) }}</td>
                                        <td>{{ __($transaction->sfirst_name .' '. $transaction->slast_name) }}</td>
                                        <td><img src="{{ asset('images/flags/16x16/' . $transaction->flag) }}" />{{ __(' ' . $transaction->country) }}</td>
                                        <td>{{ __($transaction->amount .' '. $transaction->currency) }}</td>
                                        <td class={{ ($transaction->state == 'pending')? 'alert-success' : 'alert-primary' }}>{{ __($transaction->state) }}</td>
                                        <td>{{__($transaction->rfirst_name .' '.$transaction->rlast_name)}}</td>
                                        <td>{{__($transaction->send_date)}}</td>
                                        <td class="alert-primary">{{__($transaction->mode)}}</td>
                                        <td>{{ ($transaction->withdrawal == 0)? "Office" : "Mobile service" }}</td>
                                        <td>{{ link_to_route('transact.show', 'View', [$transaction->id], ['class' => 'btn btn-success btn-block'])}}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <drivers class="col-md-12">
                    {!! $links !!}
                </drivers>
            </div>
        </div>
    </div>
@endsection
