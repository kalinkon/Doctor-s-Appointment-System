<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Patients;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class PatientRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |----------------------------------------------
    ----------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/auth/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/|unique:users',
            'gender' => 'required',
            'address'=> 'required',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'date_of_birth'=>$data['date_of_birth'],
            'email' => $data['email'],
            'role' => 'Patient',
            'gender'=> $data['gender'],
            'mobileNo' => $data['mobileNo'],
            'password' => bcrypt($data['password']),
            'isActivated'=> '1',
            'isValid'=> '1',


        ]);

//        $user = User::create([
//            'user_name' => $data['user_name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);



        $patients = Patients::create([
            'userId'=> $user->id,
            'address' => $data['address'],
            'totalAppointmentCount'=> '0',
            'noShowUpCount'=>'0',
            'showUpCount'=>'0',
        ]);
        return $user;
    }
//    public function index()
//    {
//        return view('patient.register');
//    }
//    public function success()
//    {
//        return view('success');
//    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
//        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    public function showRegistrationForm()
    {
        return view('patient.register');
    }
}
