@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container" id="detail">
            <div class="row">
                <h2 class="col-md-12">{{__('Transaction detail'.' Ref. : #'.$transaction[0]->code)}}</h2>
            </div>
            <div class="row" id="detail-x">
                <div class="col-md-6" id="detail-sender">
                    <div class="row">
                        <h3 class="col-md-12"><b>{{__('Sender')}}</b></h3>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('First Name')}}</span>
                        <span class="col-md-6">{{__(": ". $transaction[0]['sfirst_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Last Name')}}</span>
                        <span class="col-md-6">{{__(": ".$transaction[0]['slast_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Phone Number')}}</span>
                        <span class="col-md-6">{{__(': '.$transaction[0]['sphone_number'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Email')}}</span>
                        <span class="col-md-6">{{__(': ' .$transaction[0]['semail'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Address')}}</span>
                        <span class="col-md-6">{{__(': ' .$transaction[0]['saddress'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Send money from')}}</span>
                        <span class="col-md-6">{{__(': ' .$transaction[0]['scountry_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Sent date')}}</span>
                        <span class="col-md-6">{{__(': ' .$transaction[0]['send_date'])}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h3 class="col-md-12"><b>{{__('Recipient') }}</b></h3>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('First Name')}}</span>
                        <span class="col-md-6">{{__(': '.$transaction[0]['rfirst_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Last Name')}}</span>
                        <span class="col-md-6">{{__(': '. $transaction[0]['rlast_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Phone Number')}}</span>
                        <span class="col-md-6">{{__(': ' . $transaction[0]['rphone_number'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Email')}}</span>
                        <span class="col-md-6">{{__(': ' . $transaction[0]['remail'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Send money to')}}</span>
                        <span class="col-md-6">{{__(': ' .$transaction[0]['rcountry_name'])}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Withdrawal date')}}</span>
                        <span class="col-md-6">{{ ($transaction[0]['state'] == 'received')? ': ' .$transaction[0]['receive_date'] : ': --.--.-- --:--:--'}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-6">{{__('Withdrawal')}}</span>
                        <span class="col-md-6">{{ ($transaction[0]['withdrawal'] == 0)? ': Office' : 'Mobile service'}}</span>
                    </div>
                </div>
            </div>
            <div class="row" id="amount">
                <div class="col-md-4"><span>{{ __('Total amount : ' .$transaction[0]->amount .' '.$transaction[0]->currency) }}</span></div>
                <div class="col-md-4"><span>{{ __('Amount to received : ' .$transaction[0]->rec_amount .' '.$transaction[0]->rec_currency) }}</span></div>
                <div class="col-md-4"><span>{{ __('Transaction fee : ' .($transaction[0]->amount * 0.07).' '.$transaction[0]->currency) }}</span></div>
            </div>
            <div class="row" id="withdrawal">
                <div class="offset-md-4 col-md-2"><button @if($transaction[0]->state == 'received') disabled @endif type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">{{__('Confirm withdrawal')}}</button></div>
                <div class="col-md-3"><button type="button" data-toggle="modal" data-target="#cancelModal" class="btn btn-danger btn-lg">{{__('Cancel')}}</button></div>
            </div>
            <div class="row">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('Msg Confirm')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{__('Do you want to confirm withdrawal transaction ?')}}
                            </div>
                            <div class="modal-footer">
                                {{ Form::open(['method' => 'PUT', 'route' => ['transact.update', $transaction[0]->id]]) }}
                                 <input type="hidden" id="uid" name="uid" value="{{ Auth::id() }}">
                                {{ Form::submit('Yes', ['class' => 'btn btn-success']) }}
                                {!! Form::close() !!}
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('Msg Confirm')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{__('Do you want to cancel this operation ?')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                {{ link_to_route('transact.index', 'Confirm',[] ,['class' => 'btn btn-primary'])}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
