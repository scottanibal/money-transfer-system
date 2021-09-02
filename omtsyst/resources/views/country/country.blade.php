@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </ul>
                            @if(session()->has('role') and session()->get('role') == 2)
                                <span class="navbar-brand">
                                    {{ link_to_route('country.create', 'Add new country', [], ['class' => 'btn btn-outline-light']) }}
                                </span>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>{{__('List of Countries')}}</h1>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('N0')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Code ALPHA 2')}}</th>
                                <th>{{__('Code ALPHA 3')}}</th>
                                <th>{{__('Code Numeric')}}</th>
                                <th>{{__('Phone Code')}}</th>
                                <th>{{__('Flag')}}</th>
                                <th>{{__('Edit')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{ __($country->id) }}</td>
                                    <td>{{ __($country->name) }}</td>
                                    <td>{{ __($country->alpha2) }}</td>
                                    <td>{{ __($country->alpha3) }}</td>
                                    <td>{{ __($country->num) }}</td>
                                    <td>{{ __($country->phone_code) }}</td>
                                    <td><img src="{{ asset('images/flags/32x32/' . $country->flag) }}" /></td>
                                    @if(session()->has('role') and session()->get('role') == 2)
                                        <td>{{ link_to_route('country.edit', 'Edit', [$country->id], ['class' => 'btn btn-success btn-block'])}}</td>
                                    @else
                                        <td>{{ link_to_route('country.edit', 'Edit', [$country->id], ['class' => 'btn btn-success btn-block disabled'])}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $links !!}
                </div>
            </div>
        </div>
    </div>
@endsection
