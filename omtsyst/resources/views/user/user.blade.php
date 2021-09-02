@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container" id="user-x">
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
                            <span class="navbar-brand">
                                {{ link_to_route('register', 'Add new user' , [], ['class' => 'btn btn-outline-light']) }}
                            </span>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row" id="user-xy">
                        <h1 class="col-md-12">{{__('All Users')}}</h1>
                    </div>
                    <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Nom')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Detail')}}</th>
                                    <th>{{__('Update')}}</th>
                                    <th>{{__('Delete')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ __($user->id) }}</td>

                                        <td class="text-primary"><strong>{{__($user->name)}}</strong></td>

                                        <td class="text-primary"><strong>{{__($user->email)}}</strong></td>

                                        <td>{{ link_to_route('user.show', 'View', [$user->id], ['class' => 'btn btn-success btn-block'])}}</td>

                                        <td>{{ link_to_route('user.edit', 'Update', [$user->id], ['class' => 'btn btn-warning btn-block'])}}</td>

                                        <td><button type="button" data-toggle="modal" data-target="#delModal" class="btn btn-danger btn-block">{{__('Delete')}}</button> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="row">
                        {!! $links !!}
                    </div>
                    <div class="row">
                        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{__('Msg Confirm')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{__('Do you want to delete this user ?')}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>

                                        {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
    </div>
@endsection
