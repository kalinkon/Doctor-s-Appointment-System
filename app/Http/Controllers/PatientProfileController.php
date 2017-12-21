<?php

namespace App\Http\Controllers;
use App\Appointments;
use App\Doctors;
use App\SpecializationDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\User;
class PatientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();


        $birthday = new DateTime($user->date_of_birth);
        $currentDate = new DateTime(date("Y-m-d"));
        $interval = $birthday->diff($currentDate);
        $age= $interval->format('%Y');


        $appointments = Appointments::where('patient_id',$user->patients->id)->
        where('isbooked',true)->get() ;
        $count= count($appointments);

        $isAttended = Appointments::where('patient_id',$user->patients->id)->where('isbooked',true)->
                            where('scheduledTime','<',now())->get();
        $isAttendedCount=count($isAttended);
        $pastAppointments = Appointments::where('patient_id',$user->patients->id)->
        where('scheduledTime','<',now())->get();
        $pastAppointmentsCount = count($pastAppointments);
        $percentage =null;
        if($pastAppointmentsCount!=0){
            $percentage = $isAttended*100/$pastAppointmentsCount;
        }

        return view('patient.profile',['patient'=>$user,'age'=>$age,'appointmentCounts'=>$count,'percentage'=>$percentage]);

    }

    public function dash()
    {
        return view('patient.dashboard');
    }
    public function takeAppointment()
    {

        $doctors = Doctors::where('isActiveForScheduling', true)->get();
//        dd($doctors);
        $departments = SpecializationDepartment::all();
        return view('patient.takeAppointment',['doctors'=>$doctors,'departments'=>$departments]);
    }

    public function list()
    {
//        $doctors = User::where('role','Doctor')->get();
        $doctors = Doctors::all();
        return view('doctor.list')->with('doctors',$doctors);
    }

    public function upcomingAppointments()
    {
        $users = Auth::user();
//        $appointments=Appointments::where('doctor_id',$user->doctors->id)->
//                                    where('isbooked',false)->
//                                    where('isCancelled',false)->get();
        $appointments=Appointments::where('patient_id',$users->patients->id)->
        where('scheduledTime','>',now())->
        where('isbooked',false)->
        where('isCancelled',false)->get();
//        dd($appointments[0]->patient->user->name);
        $cnt = count($appointments);
        if($cnt==0){
//            flash('No Upcoming Appointments');
            return view('patient.upcomingAppointments',['appointments'=>$appointments]);
        }
        else{
            return view('patient.upcomingAppointments',['appointments'=>$appointments]);

        }

    }
    public function cancelAppointment( $id)

    {

        $appointment = Appointments::where('id',$id)->first();
        $appointment->isCancelled=true;

        $appointment->save();

        flash('Appointment with '.$appointment->doctor->user->name.' has been cancelled')->success();
        return redirect()->route('patient.upcomingAppointments');
    }

    public function liveChamber()
    {
        return redirect(route('patient.upcomingAppointments'));
    }
    public function doctorLiveStatus($id)
    {
        $userID = $id;
        $userDoctor = User::where('id',$userID)->first();
//        dd($userDoctor);
//        $use=Doctors::where('user_id',$userDoctor->id)->where('isChamberCurrentlyOpen',true)->first();
        $appaintment = null;
        $user = User::where('id',Auth::user()->id)->first();
         $usersAppointment=Appointments::where('patient_id',$user->patients->id)->where('scheduledTime','>',now())->
         where('isCancelled',false)->first();

//        dd($usersAppintment);
        if($userDoctor->doctors->isChamberCurrentlyOpen == 0){
            $appointment = Appointments::where('doctor_id',$userDoctor->id)->where('isCurrentlyActive',true)->first();

        }
        return view('patient.liveChamber',['appointment'=>$appointment,'appointmentOfCurrentUser'=>$usersAppointment]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
