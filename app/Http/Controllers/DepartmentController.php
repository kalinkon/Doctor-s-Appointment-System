<?php

namespace App\Http\Controllers;

use App\SpecializationDepartment;
use Illuminate\Http\Request;


class DepartmentController extends Controller{

    public function __construct()
    {
//        $this->middleware('auth')->only([
//            'showUniversityCreateForm',
//            'storeUniversity',
//            'showUniversityList',
//            'show',
//            'edit',
//            'update',
//            'destroy'
//        ]);
        $this->middleware('guest');

    }

    /*	public function index(Request $request){
            $universities = University::orderBy('id','ASC')->paginate(10);

            return view('university.index',compact('universities'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
        }*/

//    public function getDepartmentList(Request $request){
//
//        $departments = SpecializationDepartment::pluck('departmentName', 'id');
//        return view('partials._dropdownOptions', ['data' => $departments, 'id' => 'department', 'title' => 'department']);
//    }

//    public function showUniversityCreateForm(){
//
//        return view('university.create');
//    }

//    public function storeUniversity(Request $request){
//
//        $this->validate($request, [
//            'university_name' => 'required|string|min:10|max:255',
//            'university_location' => 'required|string|max:255',
//            'university_website' => 'required|string|max:255',
//        ]);
//
//        $university = new University;
//        $university->name = $request->university_name;
//        $university->location = $request->university_location;
//        $university->website = $request->university_website;
//
//        $university->save();
//
//        $url = $request->input('url');
//
//        flash('University added successfully !')->success();
//
//        return redirect($url);
//    }


    //University view

//    public function showUniversityList(){
//        return view('university.view');
//    }

//    public function getUniversityListByLocation(Request $request){
//
//        $page_count = 5;
//        $universities = University::where('location', $request->location)->paginate($page_count);
//
//        $theads = array('University Name', 'Location', 'Website');
//
//        $properties = array('name', 'location', 'website');
//
//        return view('partials._table',['theads' => $theads, 'properties' => $properties, 'tds' => $universities])
//            ->with('i', ($request->input('page', 1) - 1) * $page_count);
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show(Request $request, $id)
//    {
//        $university = University::find($id);
//        return view('university.show',compact('university'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit(Request $request, $id)
//    {
//        $university = University::find($id);
//        return view('university.edit',compact('university'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'name' => 'required|string|max:255',
//            'location' => 'required|string|max:255',
//            'website' => 'required|string|max:255',
//        ]);
//
//        University::find($id)->update($request->all());
//
//        $url = $request->input('url');
//
//        return redirect($url)
//            ->with('success','University updated successfully');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Request $request, $id)
//    {
//        University::find($id)->delete();
//        $url = $request->input('url');
//
//        return redirect()->back()
//            ->with('success','University deleted successfully');
//    }
}
