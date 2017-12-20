@extends('layouts.app')

@section('content')
  <div class="container">
    @include('doctor.sidebar')

    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 align="center">{{$doctor->name}}</h2>

        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-4">Name:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{$doctor->name}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4">Gender:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{$doctor->gender}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4">Age:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{28}}</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4">Address:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{$doctor->doctors->chamberAddress}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4">Phone number:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{$doctor->mobileNo}}</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4">Total appointment taken:</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{$appointmentCounts}}</p>
                  </div>
                </div>
              </form>
            </div>
            {{--<div class="col-md-3 col-sm-12">--}}
              {{--<div class="pro-pic">--}}
                {{--<img src="https://dummyimage.com/200x200/000000/fff.jpg" alt="" class="img-circle img-responsive">--}}
              {{--</div>--}}
            {{--</div>--}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


