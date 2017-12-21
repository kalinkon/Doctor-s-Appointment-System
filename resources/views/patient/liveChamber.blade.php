@extends('layouts.app')

@section('content')
    <div class="container">
        @include('patient.sidebar')

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 align="center">Chamber Status</h2>
                </div>
{{--                @include('flash::message')--}}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="serial" style="padding: 10px;">
                                <div class="row">
                                    <div class="col-md-6" style="border-right: 2px solid #f2f2f2">
                                        <h3 style="margin-bottom: 0">
                                            @if(count($appointment)==0)
                                                {{''}}

                                            @else
                                                {{
                                                'Current serial'
                                                }}

                                            @endif
                                        </h3>
                                        <p style=" font-size: 4rem; margin-top: 0 !important; margin-bottom: 5px">
                                            <b>
                                                @if(count($appointment)==0)
                                                    {{'Chamber Closed'}}

                                                @else
                                                    {{
                                                    $appointment->serial
                                                    }}

                                                @endif
                                            </b>
                                        </p>
                                    </div>
                                    <div class="col-md-6" >
                                        <h3 style="margin-bottom: 0">
                                            @if(count($appointment)==0)
                                                {{''}}

                                            @else
                                                {{
                                                'Your Time'
                                                }}

                                            @endif
                                            </h3>
                                        <p style="; font-size: 4rem; margin-top: 0 !important; margin-bottom: 5px">
                                            <b>
                                                @if(count($appointment)==0)
                                                    {{''}}

                                                @else
                                                    {{
                                                    $appointmentOfCurrentUser->scheduledTime
                                                    }}

                                                @endif
                                            </b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>/
                        <div class="col-md-4 col-sm-12">
                            <div class="pro-pic">
                                <div>
                                    <img src="https://dummyimage.com/200x200/000000/fff.jpg" alt="" class="img-circle img-responsive">
                                </div>
                                <h4 class="text-center">
                                    @if(count($appointment)==0)
                                        {{''}}

                                    @else
                                        {{$appointment->doctor->user->name}}'s chamber

                                    @endif
                                    </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


