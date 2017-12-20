@extends('layouts.app')

@section('content')
    <div class="container">
        @include('patient.sidebar')

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Profile</h2>
                </div>
                {{--@include('flash::message')--}}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-4">Name:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$doctor->doctorName}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Speciality:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$department->departmentName}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Visit Fee:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$doctor->visitFee}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Gender:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$user->gender}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Age:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$age }} years</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4">Address:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$doctor->chamberAddress}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Phone number:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">{{$user->mobileNo}}</p>
                                    </div>
                                </div>
                            </form>

                            <form class="form-horizontal" method="GET" action="{{url('/patient/appointmentCalculate/'.$doctor->id)}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Take Appointment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="pro-pic">
                                <img src="https://dummyimage.com/200x200/000000/fff.jpg" alt="" class="img-circle img-responsive">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


