@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12" style="padding: 150px 40px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter disease, specialization department or doctor's name ">
                                    <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                                </div>
                                <h3 class="text-center">Or</h3>
                                <div class="row" align="center">
                                    <div class="col-md-4 col-md-offset-2">
                                        <select class="form-control" name="gender" required>
                                            <option selected disabled>Choose gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="gender" required>
                                            <option selected disabled>Choose gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection