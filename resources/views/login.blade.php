@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
{{--		@include('flash::message')--}}

		<div class="well">
			<form class="form-horizontal">
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="email" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="mobile" class="col-sm-2 control-label">Mobile number</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="mobile" placeholder="Mobile">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Confirm Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" placeholder="Confirm Password">
			    </div>
			  </div>
			 
			  <div class="form-group">
			    <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
			    <div class="col-sm-3">
                    <input type='date' class="form-control">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="gender" class="col-sm-2 control-label">Choose Gender</label>
			    <div class="col-sm-3">
			      <select class="form-control">
			        <option>Male</option>
			        <option>Female</option>
			        <option>Other</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="degrees" class="col-sm-2 control-label">Degrees/Education</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="degrees" placeholder="for example: MBBS, FCPS">
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

