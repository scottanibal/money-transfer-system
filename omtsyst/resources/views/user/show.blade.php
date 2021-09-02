@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="user-show">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('User information') }}</h1></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Name :')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <span>{{__($user[0]->name)}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('E-mail :')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <span>{{ __($user[0]->email) }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Phone number :')}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span>{{__($user[0]->phone_number)}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Office :')}}</span>
                                </div>  
                                <div class="col-md-6">
                                    <span>{{__($office[0]->country .', '. $office[0]->address)}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Role :')}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span>{{ ($user[0]->admin == 0)? 'Employe' : (($user[0]->admin == 1)? "Admin" : "Super Admin")}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    {{ link_to_route('user.index', 'Return', [], ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
