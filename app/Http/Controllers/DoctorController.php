<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\DayOff;
use Illuminate\Http\Request;
use App\User;
use App\Doctors;
use App\SchedulingSetting;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;


class DoctorController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setScheduleParamForm()
    {
        return view('doctor.setSchedule');
    }
    public function showDayOffForm()
    {
        return view('doctor.take_day_off');
    }
    public function showDoctorProfileEdit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $doctor = $user->doctors;



        return view('doctor.doctor_profile_edit', ['user' => $user,'doctor' => $doctor]);
    }


    public function dayOffFunction(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $day_offs = ($user->doctors->day_offs==null)? new DayOff: $user->doctors->day_offs;
        $day_offs->doctor_id = $user->doctors->id;
        $day_offs->day_off_date = $request->day_off_date;
        $day_offs->save();
        $user ->save();
        flash('you have taken a leave on this date : '.$day_offs->day_off_date );
        return redirect()->route('doctor.dashboard');
    }

    public function stopTakingAppointment(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $doctor = $user->doctors;
        $doctor->isActiveForScheduling =false;
        $doctor-> save();
        $user->save();
        return redirect()->route('doctor.dashboard');
    }




    public function setScheduleParam(Request $request){


        if ($request->friday == 'true'||$request->saturday== 'true'||
            $request->sunday== 'true'||$request->monday== 'true'||$request->tuesday== 'true'||
             $request->wednesday== 'true'||$request->thursday== 'true') {
            $this->validate($request, [
//                'friday_starting'=> 'required',
//                'friday_closing' => 'required',
                'catA_time'      => 'required|integer|min:1',
                'catB_time'      => 'required|integer|min:1',
                'catC_time'      => 'required|integer|min:1',
            ]);
        }
        else{
            $this->validate($request, [
                'friday_starting'=> 'required',
                'friday_closing' => 'required',

            ]);

        }
//        if ($request->saturday!=null) {
//            $this->validate($request, [
//
////                'saturday_starting'=> 'required',
////                'saturday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }
//        if ($request->sunday!=null) {
//            $this->validate($request, [
//
////                'sunday_starting'=> 'required',
////                'sunday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }
//        if ($request->monday!=null) {
//            $this->validate($request, [
//
////                'monday_starting'=> 'required',
////                'monday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }
//        if ($request->tuesday!=null) {
//            $this->validate($request, [
//
////                'tuesday_starting'=> 'required',
////                'tuesday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }
//        if ($request->wednesday!=null) {
//            $this->validate($request, [
//
////                'wednesday_starting'=> 'required',
////                'wednesday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }
//        if ($request->thursday!=null) {
//            $this->validate($request, [
//
////                'thursday_starting'=> 'required',
////                'thursday_closing' => 'required',
//                'catA_time'      => 'required|integer|min:1',
//                'catB_time'      => 'required|integer|min:1',
//                'catC_time'      => 'required|integer|min:1',
//            ]);
//        }

        $user = User::where('id', Auth::user()->id)->first();
        $scheduling_settings = SchedulingSetting::where('doctor_id',$user->doctors->id)->first();
        $cnt = count($scheduling_settings);
        if($cnt==0){
            $scheduling_settings = ($user->doctors->scheduling_settings==null)? new SchedulingSetting: $user->doctors->scheduling_settings;
            $doctor = $user->doctors;
            $scheduling_settings-> doctor_id = $user->doctors->id;

        }
        $doctor = $user->doctors;
        $scheduling_settings-> doctor_id = $user->doctors->id;


        if ($request ->friday==null){
            $scheduling_settings->isAvailableOnFriday = false;
            $scheduling_settings->fridayStartingTime=null;
            $scheduling_settings->fridayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnFriday = true;
            $scheduling_settings->fridayStartingTime=$request->friday_starting;
            $scheduling_settings->fridayClosingTime=$request->friday_closing;

        }

        if ($request ->saturday==null){
            $scheduling_settings->isAvailableOnSaturday = false;
            $scheduling_settings->saturdayStartingTime=null;
            $scheduling_settings->saturdayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnSaturday = true;
            $scheduling_settings->saturdayStartingTime=$request->saturday_starting;
            $scheduling_settings->saturdayClosingTime=$request->saturday_closing;
        }

        if ($request ->sunday==null){
            $scheduling_settings->isAvailableOnSunday = false;
            $scheduling_settings->sundayStartingTime=null;
            $scheduling_settings->sundayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnSunday = true;
            $scheduling_settings->sundayStartingTime=$request->sunday_starting;
            $scheduling_settings->sundayClosingTime=$request->sunday_closing;
        }
        if ($request ->monday==null){
            $scheduling_settings->isAvailableOnMonday = false;
            $scheduling_settings->mondayStartingTime=null;
            $scheduling_settings->mondayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnMonday = true;
            $scheduling_settings->mondayStartingTime=$request->monday_starting;
            $scheduling_settings->mondayClosingTime=$request->monday_closing;
        }

        if ($request ->tuesday==null){
            $scheduling_settings->isAvailableOnTuesday = false;
            $scheduling_settings->tuesdayStartingTime=null;
            $scheduling_settings->tuesdayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnTuesday = true;
            $scheduling_settings->tuesdayStartingTime=$request->tuesday_starting;
            $scheduling_settings->tuesdayClosingTime=$request->tuesday_closing;
        }

        if ($request ->wednesday==null){
            $scheduling_settings->isAvailableOnWednesday = false;
            $scheduling_settings->wednesdayStartingTime=null;
            $scheduling_settings->wednesdayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnWednesday = true;
            $scheduling_settings->wednesdayStartingTime=$request->wednesday_starting;
            $scheduling_settings->wednesdayClosingTime=$request->wednesday_closing;
        }

        if ($request ->thursday==null){
            $scheduling_settings->isAvailableOnThursday = false;
            $scheduling_settings->thursdayStartingTime=null;
            $scheduling_settings->thursdayClosingTime=null;
        }
        else{
            $scheduling_settings->isAvailableOnThursday = true;
            $scheduling_settings->thursdayStartingTime=$request->thursday_starting;
            $scheduling_settings->thursdayClosingTime=$request->thursday_closing;
        }

        $scheduling_settings->timeForCategoryA_patients = $request->catA_time;
        $scheduling_settings->timeForCategoryB_patients = $request->catB_time;
        $scheduling_settings->timeForCategoryC_patients = $request->catC_time;

        $doctor->isActiveForScheduling = true;
        $scheduling_settings->save();
        $doctor->save();
        $user->save();
//        return $scheduling_settings;
        flash("your are all set, thank you");
        return redirect()->route('doctor.dashboard');

    }

    public function userActivate(Request $request){
        $this->validate($request, [
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/',
            'activation_code' => 'required|integer',
        ]);

        $user = User::where('mobileNo', $request->mobileNo)->first();
        if($user == null){
//            flash('There is no user with this number!')->error();
//            return redirect()->route('user.activation');
            return "There is no user with this number!";
        }
        if($user->isActivated){
//            flash('Your account is already activated!')->warning();
//            return redirect()->route('user.activation');
            return "Your account is already activated!";
        }

        $user_activation = $user->user_activation;
        if($user_activation==null || $user_activation->token!=$request->activation_code || strtotime($user_activation->created_at) + 60*60*24 < time()){
//            flash('Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code')->error();
//            return redirect()->route('user.activation');
            return "Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code";

        }

        $user->isActivated=true;
        if($user->role=="Patient"){
            $user->isValid=true;
        }
        $user->save();

//        this->guard()->login($user);
        return redirect()-> route('login');


    }


//    public function list()
//    {
////        $doctors = User::where('role','Doctor')->get();
//        $doctors = Doctors::all();
//        return view('doctor.list')->with('doctors',$doctors);
//    }



//    public function dash()
//    {
//        return view('doctor.dashboard');
//    }




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
