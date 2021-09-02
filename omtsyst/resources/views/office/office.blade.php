@extends('layouts.auth')
@section('content')
<div class="container-fluid">
    <div class="container" id="office-x">
        <div class="row">
            <div class="col-md-2 justify-content-end">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="navbar-collapse text-light" id="navbarText">
                        <div class="">
                            <h1>{{__('Operational offices')}}</h1>
                        </div>
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        @if(session()->has('role') and session()->get('role') == 2)
                            <nav class="navbar navbar-light">
                                {{ link_to_route('office.create', 'Add new office' , [], ['class' => 'btn btn-outline-light btn-lg']) }}
                            </nav>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('N0')}}</th>
                            <th>{{__('Country')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('Phone number')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('View')}}</th>
                            <th>{{__('Update')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offices as $office)
                            <tr>
                                <td>{{ __($office->id) }}</td>

                                <td><strong>{{__($office->country)}}</strong></td>

                                <td><strong>{{__($office->address)}}</strong></td>

                                <td><strong>{{__($office->phone_number)}}</strong></td>

                                <td class="text-primary"><strong>{{__($office->email)}}</strong></td>

                                <td>{{ link_to_route('office.show', 'View', [$office->id], ['class' => 'btn btn-success btn-block'])}}</td>
                                @if(session()->has('role') and session()->get('role') == 2)
                                    <td>{{ link_to_route('office.edit', 'Update', [$office->id], ['class' => 'btn btn-warning btn-block'])}}</td>
                                @else
                                    <td>{{ link_to_route('office.edit', 'Update', [$office->id], ['class' => 'btn btn-warning btn-block disabled'])}}</td>
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
    </div>
</div>
@endsection
