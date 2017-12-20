@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
		<div class="well">
			<div class="panel-heading" align="center" ><strong>Doctor's Registration</strong></div>
			<form class="form-horizontal"method= "POST" action="{{ route('registerDoctor') }}">
				{{ csrf_field() }}
				{{--@include('flash::message')--}}
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" placeholder="Name" name="name" required autofocus>
			    </div>
			  </div>


			  <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" name="email" class="form-control" id="email" placeholder="Email" autofocus >
					{{--@if ($errors->has('email'))--}}
						{{--<span class="help-block">--}}
									{{--<strong>{{ $errors->first('email') }}</strong>--}}
								{{--</span>--}}
					{{--@endif--}}
			    </div>
			  </div>


			  <div class="form-group{{ $errors->has('mobileNo') ? ' has-error' : '' }}">
			    <label for="mobile" class="col-sm-2 control-label">Mobile number</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="mobile" placeholder="Mobile" name="mobileNo" required autofocus>
					@if ($errors->has('mobileNo'))
						<span class="help-block">
							<strong>{{ $errors->first('mobileNo') }}</strong>
						</span>
					@endif
			    </div>
			  </div>


				<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" id="password"  required>
						@if ($errors->has('password'))
							<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
						@endif
					</div>
				</div>


				<div class="form-group">
					<label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password-confirm" name="password_confirmation"  required>
					</div>
				</div>


			  <div class="form-group">
			    <label for="department" class="col-sm-2 control-label">Select Department</label>
			    <div class="col-sm-3">
			      <select class="form-control" name="specializationDepartment">
					  <option value="" disabled="disabled" selected>Choose Department</option>
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
					  <option selected disabled>Choose gender</option>
					  <option>Male</option>
			        <option>Female</option>
			        <option>Other</option>
			      </select>
			    </div>
			  </div>




			  <div class="form-group">
			    <label for="degrees" class="col-sm-2 control-label">Degrees/Education</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="degrees" placeholder="for example: MBBS, FCPS" name="educationalDegrees" required>
			    </div>   
			  </div>



			  <div class="form-group{{ $errors->has('registrationNo') ? ' has-error' : '' }}">
			    <label for="reg_no" class="col-sm-2 control-label">Registration number</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="reg_no" placeholder="registration number" name="registrationNo" required >
					@if ($errors->has('registrationNo'))
						<span class="help-block">
							<strong>{{ $errors->first('RegistrationNo') }} already taken</strong>

						</span>
					@endif
				</div>
			  </div>

				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">Chamber's Address</label>
					<div class="col-sm-10">
						<input type="text" name="chamberAddress" class="form-control" id="address" placeholder="address" required>
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
