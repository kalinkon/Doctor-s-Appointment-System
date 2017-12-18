@extends('layouts.blank')

@section('content')
    <div class="container">
        <div class="">

            <div class="col-md-6 col-md-offset-3">
                <div class="well">
                    <div class="panel-heading" align="center" ><strong>User Activation</strong></div>
                    @include('flash::message')
                    {{--<div id="alert" class="text-center">--}}
                    {{--@include('flash::message')--}}
                    {{--</div>--}}
                    <form class="form-horizontal" method= "POST" action="{{ route('user.activation') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label">Mobile number</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="mobileNo" id="mobileNo" placeholder="Type your mobile number here"  value="{{ csrf_token() }}"required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label">Activation Code</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="activation_code" id="token" placeholder="Type your verification code here" value="{{ csrf_token() }}" required autofocus>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('user.send_activation_code') }}" style="margin-left: 132px">
                                    Resend Activation Code
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
