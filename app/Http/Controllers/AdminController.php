<?php

namespace App\Http\Controllers;

use App\DayOff;
use App\SpecializationDepartment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\User;
use App\Doctors;
use App\SchedulingSetting;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDoctorVerifyList()
    {
        $users = User::where('role', 'Doctor')->where('isValid',false)->get();
//        $doctors= Doctors::all();
//        $users = User::where('id', '4')->first();
//        dd($users);
        return view('admin.verify_doctors_list',['users'=>$users]);
    }
    public function verifyDoctor(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->isValid=true;
        $user->save();
        flash('Doctor has been added ')->success();
        return redirect()->route('admin.verifyDoctors');
    }
    public function rejectDoctor(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->isValid=null;
//        dd($user->isValid);
        $user->save();
        flash('Doctor has been rejected ')->success();
        return redirect()->route('admin.verifyDoctors');
    }

    public function showDoctorProfileEdit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $doctor = $user->doctors;
        return view('doctor.doctor_profile_edit', ['user' => $user,'doctor' => $doctor]);
    }


    public function showDoctorList(){
        $users = User::where('role', 'Doctor')->where('isValid','!=',null)->get();
//        $doctors= Doctors::all();
//        $users = User::where('id', '!=', Auth::id())->get();
//        $users = User::where('id', '4')->first();
//        dd($users);
        return view('admin.all_doctors_list',['users'=>$users]);
    }

    public function addDepartmentForm(){
        return view('admin.add_department');
    }
    public function addDepartment(Request $request){
        $department= new SpecializationDepartment();
//        dd($request->department_name);
        try {
            $this->validator($request->all())->validate();
            $department->departmentName=$request->department_name;
            $department->save();
            flash('new department '.$request->department_name.' added')->success();
        }
        catch(QueryException $exception) {
            flash('Department already exist')->error();
        }
//        dd($department);
        return redirect(route('admin.departmentAdd'));
    }

    protected function validator(array $request)
    {
        return Validator::make($request, [
            'departmentName' => 'unique:specialized_department',
        ]);
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
