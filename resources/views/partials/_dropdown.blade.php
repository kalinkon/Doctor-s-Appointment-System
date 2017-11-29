<div class="form-group">
    <div class="row">
	    <div class="col-md-2">{{ Form::label($id, $title) }}</div>
		    <div class="col-md-10">{{ Form::select($id, $data, null, ['class' => 'form-control', 'required', 'id' => $id, 'placeholder' => 'Select '.$title ]) }}
		    </div>
	  </div>
</div>