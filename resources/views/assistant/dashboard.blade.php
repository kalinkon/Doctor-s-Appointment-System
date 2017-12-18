@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('assistant.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Welcome Assistant</h1>
                        <p class="text-muted">Manage all the things</p>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection