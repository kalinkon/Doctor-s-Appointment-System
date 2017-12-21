<?php

namespace App\Http\Controllers;
use App\User;
use App\Doctors;
use Illuminate\Http\Request;

class CommonHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commonHome');
    }
    public function redirectToLogin(){
        flash('please login to see doctors profile and take appointments');
        return redirect(route('login'));
    }

    public function showDoctorSearchList(Request $request){


//        $doctors = Doctors::where('doctorName','LIKE',"%{$request->name}%")->get();
//        $users = User::where('role','Doctor')->where('name','LIKE',"%{$request->search}%")->get();
        $doctors = Doctors::where('doctorName','LIKE',"%{$request->search}%")->
        orWhere('chamberAddress','LIKE',"%{$request->search}%")->
        orWhere('specializationDepartment','LIKE',"%{$request->search}%")->
        where('isActiveForScheduling',true)->get();
//        $doctors = Doctors::where('doctorName','LIKE',"%{$request->search}%")
//            ->orWhere('specializationDepartment','LIKE',"%{$request->search}%")->get();

        if(count($doctors)!=0){
            return view('doctor_search_list_guest',['doctors'=>$doctors]);

        }
        else flash('Search result is empty');
//
        return redirect()->route("commonHome");
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
