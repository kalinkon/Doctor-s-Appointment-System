@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h1>Search results</h1>
                        @include('flash::message')
                        <p class="text-muted">See results below</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Specialize</th>
                                <th>Degree</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Dr. harun</td>
                                <td>Oncology</td>
                                <td>MBBS</td>
                                <td>
                                    <a href="" class="btn btn-primary">View Profile</a>
                                    <a href="" class="btn btn-primary">View Chamber</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr. harun</td>
                                <td>Oncology</td>
                                <td>MBBS</td>
                                <td>
                                    <a href="" class="btn btn-primary">View Profile</a>
                                    <a href="" class="btn btn-primary">View Chamber</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr. harun</td>
                                <td>Oncology</td>
                                <td>MBBS</td>
                                <td>
                                    <a href="" class="btn btn-primary">View Profile</a>
                                    <a href="" class="btn btn-primary">View Chamber</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection