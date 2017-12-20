@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('doctor.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{--@include('flash::message')--}}
                        <h1>Welcome Doctor</h1>
                        <p class="text-muted">Manage all the things</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection