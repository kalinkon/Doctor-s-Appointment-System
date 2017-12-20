@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="well">
                <div class="panel-heading" align="center" ><strong>Doctor's Registration</strong></div>
                <form class="form-horizontal">
                    {{ csrf_field() }}
                    {{--@include('flash::message')--}}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="{{$user->name}}" name="name" required autofocus>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="{{$user->email}}" autofocus required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="department" class="col-sm-2 control-label">Select Department</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="specializationDepartment">
                                <option value => Select Department</option>
                                @foreach($departmentArray as $data)
                                    <option value="{{$data->id}}">{{$data->departmentName}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-3">
                            <input type='date' name="date_of_birth" class="form-control" required>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Choose Gender</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="gender" required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="degrees" class="col-sm-2 control-label">Degrees/Education</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="degrees" placeholder="{{$doctor->educationalDegrees}}" name="educationalDegrees" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Chamber's Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="chamberAddress" class="form-control" id="address" placeholder="{{$doctor->chamberAddress}}" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
@endsection
