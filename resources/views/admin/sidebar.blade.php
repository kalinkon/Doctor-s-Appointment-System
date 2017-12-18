<div class="col-md-3">
	<div class="panel panel-default panel-flush">
	    <div class="panel-heading">
	    	<h4>Sidebar</h4>
	  	</div>
	    {{--<div class="panel-body">--}}
            {{--<ul class="tablist">--}}
                {{--<li><a href="{{ URL::route('doctor.profile') }}">Profile</a></li>--}}
            {{--</ul>--}}
	    {{--</div>--}}
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('admin.verifyDoctors') }}">Verify Doctors</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('admin.Doctors') }}"> See all doctors</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('admin.departmentAdd')}}">Add Doctor's specialization field</a></li>
            </ul>
	    </div>

	</div>
</div>