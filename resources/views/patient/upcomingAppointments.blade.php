@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Upcoming Appointments</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr class="success">
                                <th>Hello</th>
                                <th>Hello</th>
                                <th>Hello</th>
                                <th>Hello</th>
                                <th>Hello</th>
                                <th>Hello</th>
                                <th>Hello</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>333</td>
                                <th>Hello</th>
                                <td>333</td>
                                <th>Hello asdksdjs adsj</th>
                                <td>333 asjdjsj </td>
                                <th>Hello hadjsnj</th>
                                <th>Hello hadjsnj</th>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection