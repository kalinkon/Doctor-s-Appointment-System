@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('doctor.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Set Appointment Scheduling Constraints</h3>
                    </div>
                    {{--@include('flash::message')--}}
                    <div class="panel-body">

                        <form method= "POST" action="{{route('doctor.setSchedule')}}">
                            {{ csrf_field() }}
                            <div class="see_patient">
                                <h3>See patients on</h3>
                                <table class="table table-responsive">
                                    <thead>
                                    <th>Day</th>
                                    <th>Starting time</th>
                                    <th>Closing time</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="true" name="friday">
                                                    Friday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpFridayS" type="text" name="friday_starting" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpFridayC" name="friday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="saturday" value="true">
                                                    Saturday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpSaturdayS" name="saturday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpSaturdayC" name="saturday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="true" name="sunday">
                                                    Sunday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpSundayS" name="sunday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpSundayC" name="sunday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="monday" value="true">
                                                    Monday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpMondayS" name="monday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpMondayC" name="monday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tuesday" value="true">
                                                    Tuesday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpTuesdayS" name="tuesday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpTuesdayC" name="tuesday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="wednesday" value="true">
                                                    Wednesday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpWednesdayS" name="wednesday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpWednesdayC" name="wednesday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="thursday" value="true">
                                                    Thursday
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpThursdayS"  name="thursday_starting" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input id="tpThursdayC" name="thursday_closing" type="text" class="form-control input-small">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="see_time">
                                <h3>Time budget for patients</h3>
                                <table class="table table-responsive">
                                    <thead>
                                    <th>Category</th>
                                    <th>
                                        Time budget
                                        <br> <small>(in minutes)</small>
                                    </th>
                                    <th>
                                        Recommended time budget
                                        <br> <small>(in minutes)</small>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            A <br> <small>(never visited before patient)</small>
                                        </td>
                                        <td>
                                            <input type="number" name="catA_time" class="form-control input-small" required>
                                        </td>
                                        <td>
                                            10
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            B <br> <small>(visited 1-3 times)</small>
                                        </td>
                                        <td>
                                            <input type="number" name="catB_time" class="form-control input-small" required>
                                        </td>
                                        <td>
                                            15
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            A <br> <small>(visited more than 3 times)</small>
                                        </td>
                                        <td>
                                            <input type="number" name="catC_time" class="form-control input-small" required>
                                        </td>
                                        <td>
                                            12
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div align="right">
                                <button class="btn btn-success" type="submit">Submit</button>
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
        $('#tpFridayS').timepicker();
        $('#tpSaturdayS').timepicker();
        $('#tpSundayS').timepicker();
        $('#tpMondayS').timepicker();
        $('#tpTuesdayS').timepicker();
        $('#tpWednesdayS').timepicker();
        $('#tpThursdayS').timepicker();
        $('#tpFridayC').timepicker();
        $('#tpSaturdayC').timepicker();
        $('#tpSundayC').timepicker();
        $('#tpMondayC').timepicker();
        $('#tpTuesdayC').timepicker();
        $('#tpWednesdayC').timepicker();
        $('#tpThursdayC').timepicker();
    </script>
@endsection