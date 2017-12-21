<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Doctors;
use App\SMS\SMSManager;
use App\User;
//use Faker\Provider\DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Client\Exception\Exception;
use PhpParser\Comment\Doc;
use DateTime;

class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


//    public function __construct()
//    {
//
//        $this->middleware('Auth');
//    }
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();


        $birthday = new DateTime($user->date_of_birth);
        $currentDate = new DateTime(date("Y-m-d"));
        $interval = $birthday->diff($currentDate);
        $age= $interval->format('%Y');


        $appointments = Appointments::where('doctor_id',$user->doctors->id)->
                        where('isbooked',true)->get() ;
        $count= count($appointments);
        return view('doctor.profile',['doctor'=>$user,'age'=>$age,'appointmentCounts'=>$count]);

    }

    public function list()
    {
//        $doctors = User::where('role','Doctor')->get();
        $doctors = Doctors::all();
        return view('doctor.list')->with('doctors',$doctors);
    }



    public function dash()
    {
        return view('doctor.dashboard');
    }

    public function setSchedule()
    {
        return view('doctor.setSchedule');
    }
    public function upcomingAppointments()
    {
        $users = Auth::user();
//        $appointments=Appointments::where('doctor_id',$user->doctors->id)->
//                                    where('isbooked',false)->
//                                    where('isCancelled',false)->get();
        $appointments=Appointments::where('doctor_id',$users->doctors->id)->
                                    where('scheduledTime','>',now())->
                                    where('isbooked',false)->
                                    where('isCancelled',false)->get();
//        dd($appointments[0]->patient->user->name);
        $cnt = count($appointments);
        if($cnt==0){
            flash('No Upcoming Appointments');
            return view('doctor.upcomingAppointments',['appointments'=>$appointments]);
        }
        else{
            return view('doctor.upcomingAppointments',['appointments'=>$appointments]);

        }

    }
    public function cancelAppointment( $id)
    {
        $appointment = Appointments::where('id',$id)->first();
        $appointment->isCancelled=true;
        $temp = Carbon::createFromFormat('Y-m-d g:i:s', $appointment->scheduledTime)->format('g:i a d-m-Y ');

        try {
            $smsBody = 'Dear ' .$appointment->patient->user->name . '. Your serial no ' . $appointment->serial . ' for '
                . $appointment->doctor->doctorName . ' scheduled at' . $temp .
                '. has been cancelled by the doctor.';
            $smsManager = new SMSManager();
            $smsManager->sendSMS($appointment->patient->user->mobileNo, $smsBody);
        }catch (Exception $e){

        }

        $appointment->save();

        flash('Appointment with '.$appointment->patient->user->name.' has been cancelled')->success();
        return redirect()->route('doctor.upcomingAppointments');
    }

    public function appointmentHistory()
    {
        return view('doctor.appointmentHistory');
    }
    public function assistantsList()
    {
        return view('doctor.assistantsList');
    }
    public function chamber()
    {
        return view('doctor.chamber');
    }


//    public function borrowed_list()
//    {
//        $result = Issue::where('user_id',Auth::user()->id)->get();
//        return view('User.borrowed_book_list', compact('result'));
//    }

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
