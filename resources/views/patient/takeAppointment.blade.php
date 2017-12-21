@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
{{--                        @include('flash::message')--}}
                        <div class="row">
                            <div class="col-lg-12" style="padding: 150px 40px;">
                                <form class="form-horizontal" method="GET" action="{{route('patient.doctorSearchList')}}">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" name="search" required class="form-control"
                                               placeholder="Search by area, specialization department or doctor's name">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </form>

                                <h3 class="text-center">Or</h3>
                                {{--<div class="row" align="center">--}}
                                    {{--<div class="col-md-4 col-md-offset-2">--}}
                                        {{--<select class="form-control" name="department" required>--}}
                                            {{--<option selected disabled>Choose department</option>--}}
                                            {{--<option>Male</option>--}}
                                            {{--<option>Female</option>--}}
                                            {{--<option>Other</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}

                                    <form class="form-horizontal" method="POST" action="{{route('patient.doctorProfile')}}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <div class="col-md-offset-3 col-md-6" align="center">
                                                <select class="form-control" name="doctor" style="align-items: center;" required>
                                                    <option selected disabled>Choose doctor</option>
                                                    @foreach($doctors as $data)
                                                        <option value="{{$data->id}}">{{$data->doctorName}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-10">
                                                <button type="submit" class="btn btn-success">Go to Profile</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection