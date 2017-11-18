@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Doctor's Profile</h3>
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
                <label class="col-sm-2">Department</label>
                <div class="col-sm-10">
                  <p class="form-control-static">Oncology</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Degree:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">MBBS</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Chamber open time:</label>
                <div class="col-sm-10">
                  <table class="table table-bordered">
                    <thead>
                    	<tr>
                    		<th>Day</th>
                    		<th>Time</th>
                    	</tr>
                    </thead>
                    <tbody>
                    	<tr>
                    		<td>Sunday</td>
                    		<td>10am - 11am</td>
                    	</tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Approximate appointment time</label>
                <div class="col-sm-10">
                  <p class="form-control-static">5pm 11-19-2017</p>
                </div>
              </div>
              <div class="form-group">
              	<div class="col-sm-12" align="center">
              		<button class="btn btn-primary btn-md text-center">Reserve an appointment</button>
              	</div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection