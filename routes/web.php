<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('commonHome');
});

Route::get('/doctor', function () {
    return view('doctor.dashboard');
});
Route::prefix('doctor')-> group(function (){
	Route::get('profile', ['uses' => 'DoctorProfileController@index', 'as' => 'doctor.profile']);
	Route::get('register', ['uses' => 'DoctorRegisterController@index', 'as' => 'doctor.register']);
});

//Route::get('/patient', function () {
//    return view('patient.dashboard');
//});
//Route::prefix('patient')-> group(function (){
//	Route::get('profile', ['uses' => 'PatientProfileController@index', 'as' => 'patient.profile']);
//	Route::get('register', ['uses' => 'PatientRegisterController@index', 'as' => 'patient.register']);
//});




Route::get('/assistant', function () {
    return view('assistant.dashboard');
});
Route::prefix('assistant')-> group(function (){
	Route::get('profile', ['uses' => 'AssistantProfileController@index', 'as' => 'assistant.profile']);
	Route::get('register', ['uses' => 'AssistantRegisterController@index', 'as' => 'assistant.register']);
});
Route::prefix('authentication')-> group(function (){
	Route::get('login', ['uses' => 'AuthenticationLoginController@index', 'as' => 'authentication.login']);
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
