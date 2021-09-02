@extends('template')
@section('title')
    {{ __('All transaction|'. $transactions[0]->semail) }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="navbar-collapse text-light" id="navbarText">
                            <form class="form-inline" style="float:left">
                                <input class="form-control mr-sm-2" type="search" placeholder="Code transaction" aria-label="Search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="background-color: rgba(255, 255, 255, 0.5)">
                    <div class="panel panel-primary">
                        <table class="table table-responsive-md table-responsive-lg table-responsive-sm  table-dark table-striped">
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
                                    <td>{{__($transaction->id)}}</td>
                                    <td>{{ __($transaction->sfirst_name .' '. $transaction->slast_name) }}</td>
                                    <td><img src="{{ asset('images/flags/16x16/' . $transaction->flag) }}" />{{ __(' ' . $transaction->country) }}</td>
                                    <td>{{ __($transaction->amount .' '. $transaction->currency) }}</td>
                                    <td>{{ __($transaction->status) }}</td>
                                    <td>{{__($transaction->rfirst_name .' '.$transaction->rlast_name)}}</td>
                                    <td>{{__($transaction->send_date)}}</td>
                                    <td>{{__($transaction->mode)}}</td>
                                    <td>{{ ($transaction->withdrawal == 0)? "Office" : "Mobile service" }}</td>
                                    <td>
                                        <form method="get" action="{{route('track')}}">
                                            @csrf
                                            <input type="hidden" name="code" id="code" value="{{$transaction->code}}" />
                                            <input type="hidden" name="email" id="email" value="{{$transaction->semail}}" />
                                            <button type="submit" class="btn btn-primary">{{__('Track')}}</button>
                                        </form>
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

