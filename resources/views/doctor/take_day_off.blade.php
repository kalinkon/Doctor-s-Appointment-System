@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('doctor.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal"method= "POST" action="{{ route('doctor.dayOff') }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="dayOff" class="col-sm-2 control-label">Choose a day</label>
                                <div class="col-sm-3">
                                    <input type='date' name="day_off_date" class="form-control" required>
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