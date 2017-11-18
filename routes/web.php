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
    return view('welcome');
});

Route::get('/doctor', function () {
    return view('doctor.dashboard');
});
Route::prefix('doctor')-> group(function (){
	Route::get('profile', ['uses' => 'DoctorProfileController@index', 'as' => 'doctor.profile']);
	Route::get('register', ['uses' => 'DoctorRegisterController@index', 'as' => 'doctor.register']);
});

Route::get('/patient', function () {
    return view('patient.dashboard');
});
Route::prefix('patient')-> group(function (){
	Route::get('profile', ['uses' => 'PatientProfileController@index', 'as' => 'patient.profile']);
	Route::get('register', ['uses' => 'PatientRegisterController@index', 'as' => 'patient.register']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
