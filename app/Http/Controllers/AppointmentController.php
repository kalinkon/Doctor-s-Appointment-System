<?php

namespace App\Http\Controllers;
use App\SMS\SMSManager;
use App\Appointments;
use App\DayOff;
use App\SpecializationDepartment;
use Illuminate\Http\Request;
use App\User;
use App\Patients;
use App\Doctors;
use App\SchedulingSetting;
use Illuminate\Support\Facades\Auth;
use Nexmo\Client\Exception\Exception;
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

    public function getPatientDuration(Doctors $doctor) {
        $user = Auth::user();
        $appointments = Appointments::where('patient_id', $user->patients->id)
                                ->where('doctor_id', $doctor->id)
                                ->where('isbooked', true)->get();
        $schedulingSetting = SchedulingSetting::where('doctor_id', $doctor->id)->first();
        $cnt = count($appointments);
        if($cnt == 0) {
            return $schedulingSetting->timeForCategoryA_patients;
        }
        else if($cnt > 0 && $cnt < 4) {
            return $schedulingSetting->timeForCategoryB_patients;
        }
        else {
            return $schedulingSetting->timeForCategoryC_patients;
        }
    }

    public function saveAppointment($doctor, $startTime, $duration, $serial) {

        $user = Auth::user();

        $appointment = new Appointments();
        $appointment->doctor_id = $doctor->id;
        $appointment->patient_id = $user->patients->id;
        $appointment->scheduledTime = $startTime;
        $appointment->endTime = clone $startTime;
        $appointment->endTime->addMinute($duration);
        $appointment->appointmentDuration = $duration;
        $appointment->isCurrentlyActive = false;
        $appointment->serial = $serial;
        $appointment->isbooked = false;
        $appointment->isCancelled = false;
        $temp = Carbon::createFromFormat('Y-m-d g:i:s', $appointment->scheduledTime)->format('g:i a d-m-Y ');
        $appointment->save();

        try {
            $smsBody = 'Congratulations, ' . Auth::user()->name . '. Your serial no is ' . $appointment->serial . ' for '
                . $appointment->doctor->doctorName . ' and your scheduled time is ' . $temp .
                '. thank you';
            $smsManager = new SMSManager();
            $smsManager->sendSMS($user->mobileNo, $smsBody);
        }catch (Exception $e){

        }

        flash('your serial is set check your mobile');
        return redirect()->route('patient.upcomingAppointments');
    }

    public function appointmentCalculate(Request $request, $doctor_id){

        $doctor = Doctors::find($doctor_id);

        $user = Auth::user();

        $upcoming = Appointments::where('doctor_id', $doctor->id)
                            ->where('scheduledTime', '>=', Carbon::now())
                            ->where('patient_id', $user->patients->id)
                            ->where('isCancelled', false)
                            ->first();

        if($upcoming != null) {
            flash('You already have upcoming appointment for this doctor');
            return redirect()->route('patient.takeAppointment');
        }

        $day_map = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday'
        ];

        $patientDuration = $this->getPatientDuration($doctor);
        $now = Carbon::today();

        for($i = 0; $i < 30; $i++) {

            $next = clone $now;
            $next->addDay();

            // Check Off Days
            $day_off = DayOff::where('doctor_id', $doctor->id)->where('day_off_date', $now)->first();
            if ($day_off != null) {
                $now = clone $next;
                continue;
            }

            // Query Start and End time of appointment on that day
            $dayName = $day_map[$now->dayOfWeek];
            $scheduling_setting = SchedulingSetting::where('doctor_id', $doctor->id)->first();

            if ($scheduling_setting['isAvailableOn'.$dayName]==false) {
                $now = $next;
                continue;
            }

            $startingTime = $scheduling_setting[strtolower($dayName)."StartingTime"];
            $startingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$startingTime);
            $closingTime = $scheduling_setting[strtolower($dayName)."ClosingTime"];
            $closingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$closingTime);

            $todaysAppointment = Appointments::where('doctor_id', $doctor->id)
                                ->where('scheduledTime', '>=', $now)
                                ->where('scheduledTime', '<=', $next)
                                ->get();

            $savedAppointment = null;

            // checking free slot with the same patient category
            foreach ($todaysAppointment as $appointment) {
                if ($appointment->isCancelled && $patientDuration <= $appointment->appointmentDuration) {
                    return $this->saveAppointment($doctor, Carbon::parse($appointment->scheduledTime),
                        $appointment->appointmentDuration, $appointment->serial);
                }
                $savedAppointment = clone $appointment;
            }

            $nextAppointment = Appointments::where('doctor_id', $doctor->id)
                ->where('scheduledTime', '>=', $next)
                ->get();


            //addinng new appointment
            if(count($nextAppointment) == 0) {
                $tryStart = max(clone $startingTime, Carbon::now());
                $serial = 1;
                if ($savedAppointment != null){
                    $temp = clone $savedAppointment;
                    $tryStart = max(clone $tryStart,Carbon::parse($temp->endTime));
                    $tryStart->addMinutes(10); // buffer time
                    $serial = $savedAppointment->serial + 1;
                }

                $tryEnd = clone $tryStart;
                $tryEnd->addMinutes($patientDuration);

                if($tryEnd->lte($closingTime))
                    return $this->saveAppointment($doctor, $tryStart, $patientDuration, $serial);
            }

            $now = clone $next;
        }

        dd("No where");


//        $appointments = Appointments::where('doctor_id', $doctor->id)->get();
//
//        if (count($appointments) == 0) {
//            $today = Carbon::today('Asia/Dhaka');
//            $day_off = DayOff::where('doctor_id', $doctor->id)->where('day_off_date', $today)->first();
//            if($day_off == null) {
//                $dayName = $day_map[$today->dayOfWeek];
//                $scheduling_setting = SchedulingSetting::where('doctor_id', $doctor->id)->first();
//                if ($scheduling_setting['isAvailableOn'.$dayName]) {
//                   $now = Carbon::now();
//                   $startingTime = $scheduling_setting[strtolower($dayName)."StartingTime"];
//                   $startingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$startingTime);
//                   $closingTime = $scheduling_setting[strtolower($dayName)."ClosingTime"];
//                   $closingTime = Carbon::createFromFormat('Y-m-d g:i A', $now->format('Y-m-d ').$closingTime);
//                   if($now->gte($startingTime) && $now->lte($closingTime)) {
//                       $appointment = new Appointments();
//                       $appointment->serial = 1;
//                       $appointment->doctor_id = $doctor->id;
//                       $appointment->patient_id = Auth::user()->patients->id;
//                       $appointment->scheduledTime = Carbon::now()->addHour(1);
//                       $appointment->appointmentDuration = 15;
//                       $appointment->endTime = Carbon::now()->addHour(1)->addMinute($appointment->appointmentDuration);
//                       $appointment->save();
//                       return redirect()->route('patient.doctorSearchList');
//                   }
//                }
//            }
//        }
//        else {
//
//        }

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
