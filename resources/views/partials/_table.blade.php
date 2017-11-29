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