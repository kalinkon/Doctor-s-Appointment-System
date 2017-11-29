@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li style="list-style: none;">{{ $error }}</li>
    @endforeach
</div>
@endif