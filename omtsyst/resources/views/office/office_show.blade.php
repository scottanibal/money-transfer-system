@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="office-show">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Office information') }}</h1></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Address :')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <span>{{__($office[0]->address)}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('E-mail :')}}</span>
                                </div>
                                <div class="col-md-10">
                                    <span>{{ __($office[0]->email) }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Phone number :')}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span>{{__($office[0]->phone_number)}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>{{__('Country :')}}</span>
                                </div>
                                <div class="col-md-6">
                                    <span>{{__($office[0]->country)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    {{ link_to_route('office.index', 'Return', [], ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
@endsection
