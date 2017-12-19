<table class="table table-bordered table-responsive">

  <thead>
    <tr>
      <th>#</th>
      @foreach ($theads as $thead)
          <th>{{ $thead }}</th>
      @endforeach
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($tds as $index => $td)
      <tr>
        <th scope="row">{{++$index}}</th>
        @foreach ($properties as $property)
          <td>{{ $td -> $property }}</td>
        @endforeach
          <td>
              <a class="btn btn-info btn-sm" href="show/{{$td->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="btn btn-primary btn-sm" href="edit/{{$td->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <a class="btn btn-danger btn-sm" href="delete/{{$td->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i>
              </a>
          </td>
    @endforeach
    </tr>
  </tbody>

</table>




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