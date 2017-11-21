@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body"> --}}
                   {{--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <!-- Example single danger button -->
                    {{-- <div class="col-lg-10">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Enter disease, specialization department or doctor's name ">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                        </div>
                      </div> --}}

    {{--                 You are logged in!
                </div>
            </div>
        </div> --}}

        <div class="col-lg-12" style="margin-top:300px ">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter disease, specialization department or doctor's name " style="padding-top: 20px;padding-bottom: 20px">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button" style="padding-top: 10px;padding-bottom: 8px">Go!</button>
              </span>
            </div>
          </div>
    </div>
</div>
@endsection
