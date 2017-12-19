@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h1><strong>Enrolled Doctors</strong></h1>
                        {{--<p class="text-muted">See results below</p>--}}
                    </div>

                </div>
                <div class="panel panel-default">
                    @include('flash::message')
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Registration No.</th>
                                <th>Total appointment taken</th>
                                <th>Degree</th>
                                <th>Chamber Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)

                                <tr>
                                    <td>{{$item->doctors->doctorName}}</td>
                                    <td>{{$item->doctors->specializationDepartment}}</td>
                                    <td>{{$item->doctors->registrationNo}}</td>
                                    <td></td>
                                    <td> {{$item->doctors->id}}</td>
                                    <td>{{$item->doctors->chamberAddress}}</td>

                                    <td>
                                        @if($item->doctors->isActiveForSchedluing==true)
                                            {{'Active'}}
                                        @else
                                            {{'Away'}}
                                        @endif

                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary">Profile</a>
{{--                                        <a href="{{url('/admin/rejectDoctor/'.$item->id)}}" class="btn btn-primary">Reject</a>--}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('css')
    <style rel="stylesheet">
        .table > tbody > tr > td {
            max-width: 100px;
            overflow-wrap: break-word;
        }
    </style>
@endsection