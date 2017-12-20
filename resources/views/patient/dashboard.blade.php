@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    @include('flash::message')
                    <div class="panel-body">
                        {{--@include('flash::message')--}}
                        <h1>Welcome patient</h1>
                        <p class="text-muted">Manage all the things</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection