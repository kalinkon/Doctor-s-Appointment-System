@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('doctor.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Set Chamber Opening Time</h3>
                    </div>
                    <div class="panel-body">
                        <h3>See patients on</h3>
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="checkbox" style="margin-top: 30px;">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    Friday
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="time">Start time</label>
                                        <div class="input-group bootstrap-timepicker timepicker">
                                            <input id="timepicker1" type="text" class="form-control input-small">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="time2">Closing time</label>
                                        <div class="input-group bootstrap-timepicker timepicker">
                                            <input id="timepicker2" type="text" class="form-control input-small">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();
    </script>
@endsection