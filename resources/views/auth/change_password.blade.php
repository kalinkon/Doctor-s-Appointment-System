@extends('layouts.blank')

@section('content')
    <div class="container">
        <div class="">

            <div class="col-md-6 col-md-offset-3">
                <div class="well">
                    <div class="panel-heading" align="center" ><strong>Change Password</strong></div>

                    {{--<div id="alert" class="text-center">--}}
                    {{--@include('flash::message')--}}
                    {{--</div>--}}
                    @include('flash::message')
                    <form class="form-horizontal" method= "POST" action="{{route('user.change_password')}}">
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

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Give your new password (minimum size 6)" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm password"  required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-success">Send</button>

                                <a href="{{ route('user.send_activation_code_forget_password') }}" style="margin-left: 200px">
                                    Resend Code
                                </a>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection