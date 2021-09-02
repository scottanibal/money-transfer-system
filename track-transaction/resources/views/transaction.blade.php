@extends('template')
@section('title')
    {{__('Track|Transaction #'. $transaction[0]->code )}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-6 col-6 offset-md-10 col-md-2" style="padding: 3px 0px 3px 0px">
               <a href="{{ route('trans', ['_token' => @csrf_token(), 'email' => $transaction[0]->semail])}}" class="btn btn-primary btn-block">{{__('See all transactions')}}</a>
            </div>
        </div>
        <div class="row" id="track-view">
            <div class="col-12 col-md-6" style="border-right: 2px solid #1b4b72;">
                <div class="row">
                    <h1 class="col-md-12">{{__('Sender')}}</h1>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Name')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->sfirst_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Last name')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->slast_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Phone number')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->sphone_number)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Email')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->semail)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Address')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->saddress)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Country')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->scountry_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Sent date')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->send_date)}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h1 class="col-md-12">{{__('Recipient')}}</h1>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Name')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->rfirst_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Last name')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->rlast_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Phone number')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->rphone_number)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Email')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->remail)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Address')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->raddress)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Country')}}</span>
                    <span class="col-6 col-md-6">{{__(': '.$transaction[0]->rcountry_name)}}</span>
                </div>
                <div class="row">
                    <span class="col-6 col-md-6">{{__('Receive date')}}</span>
                    <span class="col-6 col-md-6">{{__(($transaction[0]->status == 'pending')? ': ----/--/-- --:--:--' : ': '.$transaction[0]->receive_date)}}</span>
                </div>
            </div>
        </div>
        <div class="row" id="track-view-amount" style="background-color: rgba(10, 0 , 255,0.5);color:white">
            <div class="col-md-6">
                <h1>{{__('Total amount :' . $transaction[0]->amount .' '. $transaction[0]->currency)}}</h1>
            </div>
            <div class="col-md-6">
                <h1>{{__('Status : ' . $transaction[0]->status)}}</h1>
            </div>
        </div>
    </div>
@endsection
