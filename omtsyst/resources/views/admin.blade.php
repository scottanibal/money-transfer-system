@extends('layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="navbar-collapse justify-content-center text-light">
                        <h1>{{__('SYSTEM FREQUENCIES')}}</h1>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-md-6 justify-content-center" style="padding-top:5px">
                <h1 style="border:1px solid #19568f" class="row justify-content-center" >
                    {{__('Transaction statistics')}}
                </h1>
                <div class="row">
                    <h2 style="border-bottom:8px solid #19568f">{{__('Sending Countries')}}</h2>
                    <canvas class="col-md-12" id="myChartFrom" style=""></canvas>
                </div>
                <div class="row">
                    <h2 style="border-bottom:8px solid #19568f">{{__('Receiving countries')}}</h2>
                    <canvas class="col-md-12" id="myChartTo"></canvas>
                </div>
            </div>
            <div class="col-md-4" style="">
                <h1 class="row justify-content-center">{{__('Visitors by country')}}</h1>
                <div class="row" style="border:1px solid #cccccc">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="alert-success">{{__('Pays')}}</th>
                        <th class="alert-primary">{{__('Total visites')}}</th>
                        <th class="alert-success">{{__('Date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($requestLog as $request)
                            <tr>
                                <td class="alert-success">
                                    <img src="{{ asset('images/flags/32x32/' . $request->flag) }}" />{{ __(' '. $request->name)}}
                                </td>
                                <td class="alert-primary">
                                    {{$request->nbr}}
                                </td>
                                <td class="alert-success">
                                    {{__('this week')}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <h1 class="row justify-content-center" style="border:1px solid #1b4b72">
                    {{__('page views')}}
                </h1>
                <div class="row" style="border:1px solid #cccccc; margin-top:5px;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="alert-success">{{__('Total')}}</th>
                            <th class="alert-primary">{{__('Page')}}</th>
                            <th class="alert-success">{{__('Date')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td class="alert-success">
                                    {{$page->nbr}}
                                </td>
                                <td class="alert-primary">
                                    {{$page->page . ' ['. $page->method.']'}}
                                </td>
                                <td class="alert-success">
                                    {{__('This week')}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
