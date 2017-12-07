<div class="col-md-3">
	<div class="panel panel-default panel-flush">
	    <div class="panel-heading">
	    	<h4>Sidebar</h4>
	  	</div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.profile') }}">Profile</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.setSchedule') }}">Set/Edit Appointment Scheduling System</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.upcomingAppointments') }}"> Upcoming Appointments</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.appointmentHistory') }}">Appointment History</a></li>
            </ul>
	    </div>

	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.chamber') }}">Chamber</a></li>
            </ul>
	    </div>
	</div>
</div>