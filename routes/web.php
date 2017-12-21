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
//Route::prefix('authentication')-> group(function (){
//    Route::get('login', ['uses' => 'AuthenticationLoginController@index', 'as' => 'authentication.login']);
//
//});

Route::get('/', function () {
    return view('commonHome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/success', 'SuccessController@index')->name('success');

Route::prefix('Department')-> group(function (){

    Route::post('list', ['uses' => 'DepartmentController@getDepartmentList', 'as' => 'department.list']);

});

Route::group(["middleware" => ['auth', 'assistant']], function () {
    Route::get('/assistant', function () {
        return view('assistant.dashboard');
    });
    Route::prefix('assistant')-> group(function (){
        Route::get('profile', ['uses' => 'AssistantProfileController@index', 'as' => 'assistant.profile']);
        Route::get('register', ['uses' => 'AssistantRegisterController@dash', 'as' => 'assistant.dashboard']);
    });
});
Route::group(["middleware" => ['auth', 'admin']], function () {
    Route::prefix('admin')-> group(function (){
        Route::get('verifyDoctor', ['uses' => 'AdminController@showDoctorVerifyList', 'as' => 'admin.verifyDoctors']);
        Route::get('/verifyDoctor/{id}','AdminController@verifyDoctor');
        Route::get('/rejectDoctor/{id}','AdminController@rejectDoctor');
        Route::get('DoctorList', ['uses' => 'AdminController@showDoctorList', 'as' => 'admin.Doctors']);
        Route::get('departmentAdd', ['uses' => 'AdminController@addDepartmentForm', 'as' => 'admin.departmentAdd']);
        Route::post('departmentAdd', ['uses' => 'AdminController@addDepartment', 'as' => 'admin.departmentAdd']);

    });

});
Route::group(["middleware" => ['auth', 'doctor']], function () {
    Route::get('/doctor', function () {
        return view('doctor.dashboard');
    });
    Route::prefix('doctor')-> group(function (){
        Route::get('profile', ['uses' => 'DoctorProfileController@index', 'as' => 'doctor.profile']);
        Route::get('dashboard', ['uses' => 'DoctorProfileController@dash', 'as' => 'doctor.dashboard']);

        Route::get('setSchedule', ['uses' => 'DoctorController@setScheduleParamForm', 'as' => 'doctor.setSchedule']);
        Route::post('setSchedule', ['uses' => 'DoctorController@setScheduleParam', 'as' => 'doctor.setSchedule']);

        Route::get('upcomingAppointments', ['uses' => 'DoctorProfileController@upcomingAppointments', 'as' => 'doctor.upcomingAppointments']);
        Route::get('appointmentHistory', ['uses' => 'DoctorProfileController@appointmentHistory', 'as' => 'doctor.appointmentHistory']);
        Route::get('assistantsList', ['uses' => 'DoctorProfileController@assistantsList', 'as' => 'doctor.assistantsList']);
        Route::get('chamber', ['uses' => 'DoctorProfileController@chamber', 'as' => 'doctor.chamber']);

        Route::get('dayOff', ['uses' => 'DoctorController@showDayOffForm', 'as' => 'doctor.dayOff']);
        Route::post('dayOff', ['uses' => 'DoctorController@dayOffFunction', 'as' => 'doctor.dayOff']);
        Route::post('stopTakingAppointment', ['uses' => 'DoctorController@stopTakingAppointment', 'as' => 'doctor.stopTakingAppointment']);

        Route::get('doctorProfileEdit', ['uses' => 'DoctorController@showDoctorProfileEdit', 'as' => 'doctor.doctorProfileEdit']);


//	Route::get('register', ['uses' => 'DoctorRegisterController@index', 'as' => 'doctor.register']);
        Route::get('list', ['uses' => 'DoctorProfileController@list', 'as' => 'doctor.list']);
        Route::get('/cancelAppointment/{id}','DoctorProfileController@cancelAppointment');


    });

});
Route::group(["middleware" => ['auth', 'patient']], function () {
    Route::get('/patient', function () {
        return view('patient.dashboard');
    });
    Route::prefix('patient')-> group(function (){
        Route::get('profile', ['uses' => 'PatientProfileController@index', 'as' => 'patient.profile']);
        Route::get('dashboard', ['uses' => 'PatientProfileController@dash', 'as' => 'patient.dashboard']);
        Route::get('takeAppointment', ['uses' => 'PatientProfileController@takeAppointment', 'as' => 'patient.takeAppointment']);
//    Route::get('upcomingAppointments', ['uses' => 'PatientProfileController@upcomingAppointments', 'as' => 'patient.upcomingAppointments']);
        Route::get('liveChamber', ['uses' => 'PatientProfileController@liveChamber', 'as' => 'patient.liveChamber']);
//	Route::get('register', ['uses' => 'PatientRegisterController@index', 'as' => 'patient.register']);

        Route::get('activation',['uses' => 'Auth\PatientRegisterController@showActivationForm', 'as' => 'patient.activation']);
        Route::post('activation',['uses' => 'Auth\PatientRegisterController@userActivate', 'as' => 'patient.activation']);

        Route::get('doctorSearchList',['uses' => 'PatientController@showDoctorSearchList', 'as' => 'patient.doctorSearchList']);

        Route::post('doctorProfile',['uses' => 'PatientController@loadDoctorProfile', 'as' => 'patient.doctorProfile']);
//    Route::get('doctorProfile',['uses' => 'PatientController@getDoctorProfile', 'as' => 'patient.doctorProfile']);
        Route::get('/doctorProfile/{id}','PatientController@getDoctorProfile');
        Route::get('/liveChamber/{id}','PatientProfileController@doctorLiveStatus');


//    Route::get('/appointmentCalculate/{id}',['uses' => 'PatientController@appointmentCalculate', 'as' => 'patient.appointmentCalculate']);
        Route::get('/appointmentCalculate/{id}','AppointmentController@appointmentCalculate');
        Route::get('/cancelAppointment/{id}','PatientProfileController@cancelAppointment');
        Route::get('upcomingAppointments', ['uses' => 'PatientProfileController@upcomingAppointments', 'as' => 'patient.upcomingAppointments']);


    });

});


Route::get('doctorSearchList',['uses' => 'CommonHomeController@showDoctorSearchList', 'as' => 'doctorSearchListGuest']);
Route::get('redirectToLogin',['uses' => 'CommonHomeController@redirectToLogin', 'as' => 'redirectToLogin']);

Route::prefix('user')-> group(function (){


    Route::get('activation',['uses' => 'Auth\UserActivationController@showActivationForm', 'as' => 'user.activation']);
    Route::post('activation',['uses' => 'Auth\UserActivationController@userActivate', 'as' => 'user.activation']);

    Route::get('send_activation_code',['uses' => 'Auth\UserActivationController@showResendActivationCodeForm', 'as' => 'user.send_activation_code']);
    Route::post('send_activation_code',['uses' => 'Auth\UserActivationController@activationCodeSend', 'as' => 'user.send_activation_code']);

    Route::get('send_activation_code_forget_password',['uses' => 'Auth\UserActivationController@showResendActivationCodeForgetPasswordForm',
        'as' => 'user.send_activation_code_forget_password']);
    Route::post('send_activation_code_forget_password',['uses' => 'Auth\UserActivationController@forgetPasswordCodeSend',
        'as' => 'user.send_activation_code_forget_password']);

    Route::get('change_password',
        ['uses' => 'Auth\UserActivationController@showChangePasswordForm',
        'as' => 'user.change_password']);
    Route::post('change_password',
        ['uses' => 'Auth\UserActivationController@changePassword',
            'as' => 'user.change_password']);


});

//Route::get('/doctor', function () {
//    return view('doctor.dashboard');
//});
//Route::prefix('admin')-> group(function (){
//    Route::get('verifyDoctor', ['uses' => 'AdminController@showDoctorVerifyList', 'as' => 'admin.verifyDoctors']);
//    Route::get('/verifyDoctor/{id}','AdminController@verifyDoctor');
//    Route::get('/rejectDoctor/{id}','AdminController@rejectDoctor');
//    Route::get('DoctorList', ['uses' => 'AdminController@showDoctorList', 'as' => 'admin.Doctors']);
//    Route::get('departmentAdd', ['uses' => 'AdminController@addDepartmentForm', 'as' => 'admin.departmentAdd']);
//    Route::post('departmentAdd', ['uses' => 'AdminController@addDepartment', 'as' => 'admin.departmentAdd']);
//
//});

//Route::prefix('doctor')-> group(function (){
//	Route::get('profile', ['uses' => 'DoctorProfileController@index', 'as' => 'doctor.profile']);
//    Route::get('dashboard', ['uses' => 'DoctorProfileController@dash', 'as' => 'doctor.dashboard']);
//
//    Route::get('setSchedule', ['uses' => 'DoctorController@setScheduleParamForm', 'as' => 'doctor.setSchedule']);
//    Route::post('setSchedule', ['uses' => 'DoctorController@setScheduleParam', 'as' => 'doctor.setSchedule']);
//
//    Route::get('upcomingAppointments', ['uses' => 'DoctorProfileController@upcomingAppointments', 'as' => 'doctor.upcomingAppointments']);
//    Route::get('appointmentHistory', ['uses' => 'DoctorProfileController@appointmentHistory', 'as' => 'doctor.appointmentHistory']);
//    Route::get('assistantsList', ['uses' => 'DoctorProfileController@assistantsList', 'as' => 'doctor.assistantsList']);
//    Route::get('chamber', ['uses' => 'DoctorProfileController@chamber', 'as' => 'doctor.chamber']);
//
//    Route::get('dayOff', ['uses' => 'DoctorController@showDayOffForm', 'as' => 'doctor.dayOff']);
//    Route::post('dayOff', ['uses' => 'DoctorController@dayOffFunction', 'as' => 'doctor.dayOff']);
//    Route::post('stopTakingAppointment', ['uses' => 'DoctorController@stopTakingAppointment', 'as' => 'doctor.stopTakingAppointment']);
//
//    Route::get('doctorProfileEdit', ['uses' => 'DoctorController@showDoctorProfileEdit', 'as' => 'doctor.doctorProfileEdit']);
//
//
////	Route::get('register', ['uses' => 'DoctorRegisterController@index', 'as' => 'doctor.register']);
//    Route::get('list', ['uses' => 'DoctorProfileController@list', 'as' => 'doctor.list']);
//    Route::get('/cancelAppointment/{id}','DoctorProfileController@cancelAppointment');
//
//
//});



//Route::get('/patient', function () {
//    return view('patient.dashboard');
//});
//Route::prefix('patient')-> group(function (){
//	Route::get('profile', ['uses' => 'PatientProfileController@index', 'as' => 'patient.profile']);
//    Route::get('dashboard', ['uses' => 'PatientProfileController@dash', 'as' => 'patient.dashboard']);
//    Route::get('takeAppointment', ['uses' => 'PatientProfileController@takeAppointment', 'as' => 'patient.takeAppointment']);
////    Route::get('upcomingAppointments', ['uses' => 'PatientProfileController@upcomingAppointments', 'as' => 'patient.upcomingAppointments']);
//    Route::get('liveChamber', ['uses' => 'PatientProfileController@liveChamber', 'as' => 'patient.liveChamber']);
////	Route::get('register', ['uses' => 'PatientRegisterController@index', 'as' => 'patient.register']);
//
//    Route::get('activation',['uses' => 'Auth\PatientRegisterController@showActivationForm', 'as' => 'patient.activation']);
//    Route::post('activation',['uses' => 'Auth\PatientRegisterController@userActivate', 'as' => 'patient.activation']);
//
//    Route::get('doctorSearchList',['uses' => 'PatientController@showDoctorSearchList', 'as' => 'patient.doctorSearchList']);
//
//    Route::post('doctorProfile',['uses' => 'PatientController@loadDoctorProfile', 'as' => 'patient.doctorProfile']);
////    Route::get('doctorProfile',['uses' => 'PatientController@getDoctorProfile', 'as' => 'patient.doctorProfile']);
//    Route::get('/doctorProfile/{id}','PatientController@getDoctorProfile');
////    Route::get('/appointmentCalculate/{id}',['uses' => 'PatientController@appointmentCalculate', 'as' => 'patient.appointmentCalculate']);
//    Route::get('/appointmentCalculate/{id}','AppointmentController@appointmentCalculate');
//    Route::get('/cancelAppointment/{id}','PatientProfileController@cancelAppointment');
//    Route::get('upcomingAppointments', ['uses' => 'PatientProfileController@upcomingAppointments', 'as' => 'patient.upcomingAppointments']);
//
//
//});





//Route::get('/assistant', function () {
//    return view('assistant.dashboard');
//});
//Route::prefix('assistant')-> group(function (){
//	Route::get('profile', ['uses' => 'AssistantProfileController@index', 'as' => 'assistant.profile']);
//	Route::get('register', ['uses' => 'AssistantRegisterController@dash', 'as' => 'assistant.dashboard']);
//});

