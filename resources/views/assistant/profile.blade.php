@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Your Profile</h3>
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
                <label class="col-sm-2">Your Doctor:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">Dr Rahman</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2">Education:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">SSC, HSC</p>
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
                <label class="col-sm-2">Doctor's fee:</label>
                <div class="col-sm-10">
                  <p class="form-control-static">500 taka only</p>
                </div>
              </div>
              
            </form>
          </div>
        </div>
    </div>
@endsection