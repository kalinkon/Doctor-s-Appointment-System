@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-heading">
                            <h3 align="center">Add Specialization Field of Doctors</h3>
                        </div>
                        <form class="form-horizontal"method= "POST" action="{{ route('admin.departmentAdd') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('department_name') ? ' has-error' : '' }}" >
                                @include('flash::message')
                                <label for="name" class="col-sm-2 control-label" >Name</label>
                                <div class="col-sm-8">
                                    <input align="center" type="text" class="form-control" id="name" placeholder="Name" name="department_name" required autofocus>
                                    @if ($errors->has('department_name'))
                                        <span class="help-block">
									        <strong>{{ $errors->first('department_name') }}</strong>
								        </span>
                                    @endif
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
        </div>
    </div>
@endsection