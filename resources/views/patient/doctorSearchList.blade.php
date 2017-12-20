@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h1>Search results</h1>
{{--                        @include('flash::message')--}}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Degrees</th>
                                <th>Visit Fee</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $item)

                                <tr>
                                    <td >{{$item->doctorName}}</td>
                                    <td>{{$item->specializationDepartment}}</td>
                                    <td> {{$item->educationalDegrees}}</td>
                                    <td> {{$item->visitFee}}</td>
                                    <td>{{$item->chamberAddress}}</td>
                                    <td>
                                        <a href="{{url('/patient/doctorProfile/'.$item->user->id)}}" class="btn btn-primary">Profile</a>
                                        {{--<a href="{{url('/admin/rejectDoctor/'.$item->id)}}" class="btn btn-primary">Reject</a>--}}
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