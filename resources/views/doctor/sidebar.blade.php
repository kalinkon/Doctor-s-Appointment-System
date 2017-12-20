<div class="col-md-3">
	<div class="panel panel-default panel-flush">
	    <div class="panel-heading">
	    	<h4>Sidebar</h4>
	  	</div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.profile') }}"> Your profile</a></li>
            </ul>
	    </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.setSchedule') }}">Scheduling Settings</a></li>
            </ul>
	    </div>
        <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.dayOff') }}">take a day off</a></li>
            </ul>
        </div>
	    <div class="panel-body">
            <ul class="tablist">
                <li><a href="{{ URL::route('doctor.upcomingAppointments') }}"> Upcoming Appointments</a></li>
            </ul>
	    </div>


        {{--<div class="panel-body">--}}
            {{--<ul class="tablist">--}}
                {{--<li><a href="{{ URL::route('doctor.assistantsList') }}">Assistants list</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}

        <div class="panel-body">
                <ul class="tablist">
                    <li><a href="{{ URL::route('doctor.chamber') }}">Chamber</a></li>
                </ul>
            </div>
        </div>
</div>