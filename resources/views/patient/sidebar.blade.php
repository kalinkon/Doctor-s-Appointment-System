<div class="col-md-3">
	<div class="panel panel-default panel-flush">
	    <div class="panel-heading">
	    	<h4>Sidebar</h4>
	  	</div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('patient.profile') }}">Profile</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('patient.takeAppointment') }}">Take an Appointment</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('patient.upcomingAppointments') }}">Upcomig Appointments</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('patient.profile') }}">Appointment history</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('patient.liveChamber') }}">Live Chambers</a></li>
            </ul>
	    </div>
	</div>
</div>