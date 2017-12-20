@extends('layouts.app')

{{--@section('title')--}}
    {{--Book-issue-approval--}}
{{--@endsection--}}

@section('content')

    <div class="container-fluid">
        <div class="row">
            <main class="col-sm-12" role="main">
                <h2 style="margin-bottom: 20px" class="d-none d-sm-block text-center">Doctor's List</h2>
                <hr>
                {{--@include('flash::message')--}}
                <div>
                    <div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Chamber</th>
                                <th>Speciality </th>
                                <th>Visit Fee</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            @if(count($doctors))

                                @foreach($doctors as $item)
                                    <tbody>
                                    <tr>

                                        {{--<td>hi</td>--}}
                                        {{--<td>hi</td>--}}
                                        {{--<td>hi</td>--}}
                                        {{--<td>hi</td>--}}

                                        <td>{{$item->user_id}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->mobileNo}}</td>
                                        <td>{{$item->user->email}}</td>
                                        <td>{{$item->chamberAddress}}</td>
                                        <td>{{$item->specializationDepartment}}</td>
                                        <td>{{$item->visitFee}}</td>
{{--                                        <td>{{$item->borrow_date}}</td>--}}
                                        {{--<td>{{$item->return_date}}</td>--}}
                                        <td>
                                        {{--{{('/approveBorrowRequest/'.$item->id)}}--}}
                                            <form action="" method="GET">
                                                {{ csrf_field() }}
                                                <input type="submit" value="Accept" class="btn btn-success">
                                            </form>
                                            {{--{{('/declineBorrowRequest/'.$item->id)}}--}}
                                            <form action="" method="GET" onclick="return confirm('Are you sure to reject the request?')">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="Decline" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                @else

                                <tbody>
                                <tr>

                                    <td>hi</td>
                                    <td>hi</td>
                                    <td>hi</td>
                                    <td>hi</td>

                                    {{--<td>{{$item->user->id}}</td>--}}
                                    {{--<td>{{$item->user->name}}</td>--}}
                                    {{--<td>{{$item->user->mobileNo}}</td>--}}
                                    {{--<td>{{$item->user->email}}</td>--}}
                                    {{--<td>{{$item->doctors->chamberAddress}}</td>--}}
                                    {{--<td>{{$item->doctors->specializationDepartment}}</td>--}}
                                    {{--<td>{{$item->user->}}</td>--}}
                                    {{--<td>{{$item->borrow_date}}</td>--}}
                                    {{--<td>{{$item->return_date}}</td>--}}
                                    {{--<td>--}}
                                    {{--{{('/approveBorrowRequest/'.$item->id)}}--}}
                                    <form action="" method="GET">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Accept" class="btn btn-success">
                                    </form>
                                    {{--{{('/declineBorrowRequest/'.$item->id)}}--}}
                                    <form action="" method="GET" onclick="return confirm('Are you sure to reject the request?')">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Decline" class="btn btn-danger">
                                    </form>
                                    </td>
                                </tr>
                                </tbody>

                                @endif

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

