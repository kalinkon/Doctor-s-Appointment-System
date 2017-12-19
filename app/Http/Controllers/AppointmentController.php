<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\DayOff;
use App\SpecializationDepartment;
use Illuminate\Http\Request;
use App\User;
use App\Patients;
use App\Doctors;
use App\SchedulingSetting;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function appointmentCalculate($doctor_id){
//          {{ $id->id; }}
        $doctor = Doctors::find($doctor_id);

        $appointments = Appointments::where('doctor_id', $doctor->id)->get();
        $user = Auth::user();

        $day_map = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday'
        ];

        if (count($appointments) == 0) {
            $today = Carbon::today('Asia/Dhaka');
            $day_off = DayOff::where('doctor_id', $doctor->id)->where('day_off_date', $today)->first();
            if($day_off == null) {
                $dayName = $day_map[$today->dayOfWeek];
                $scheduling_setting = SchedulingSetting::where('doctor_id', $doctor->id)->first();
                if ($scheduling_setting['isAvailableOn'.$dayName]) {
                   $now = Carbon::now();
                   $startingTime = $scheduling_setting[strtolower($dayName)."StartingTime"];
                   $startingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$startingTime);
                   $closingTime = $scheduling_setting[strtolower($dayName)."ClosingTime"];
                   $closingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$closingTime);
                   if($now->gte($startingTime) && $now->lte($closingTime)) {
                       dd('jnn');
                   }
                }
            }
        }
        else {

        }

        return redirect()->route('patient.doctorSearchList');
    }


//        return view('patient.profile_doctor',['doctor'=>$doctor,'user'=>$user,'department'=>$department,'age'=>$age]);






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
