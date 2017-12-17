<?php

namespace App\Http\Controllers;

use App\Doctors;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;


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
        return view('doctor.profile');
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
        return view('doctor.upcomingAppointments');
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
