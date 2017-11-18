@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Patient's Profile</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2">Name:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">Dr. Rashid</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Gender:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">Male</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Age:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">28</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Blood group:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">O+</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Address:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">kaliakoir,savar,dhaka</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Phone number:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">+88017171717171</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Show up pecentage:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">78%</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Total appointment taken:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">50</p>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection