@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="margin-top:300px ">
            <form class="form-horizontal" method="GET" action="{{route('doctorSearchListGuest')}}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="search" required class="form-control"
                           placeholder="Search by area, specialization department or doctor's name ">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                    </span>
                </div>
            </form>
          </div>
    </div>
</div>
@endsection
