<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Doctors;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class DoctorRegisterController extends Controller
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
//            'gender' => 'required',
//            'registrationNo'=> 'required',
//            'educationalDegrees' => 'required',
////            'specializationDepartment' => 'required',
//            'chamberAddress' => 'required',

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
            'role' => 'Doctor',
            'gender'=> $data['gender'],
            'mobileNo' => $data['mobileNo'],
            'password' => bcrypt($data['password']),
            'isActivated'=> '1',
            'isValid'=> '1',


        ]);

/**        •	id
•	userId
•	registrationNo.
    •	educationalDegrees
•	specializationDepartment
•	specializationDepartmentId
•	chamberAddress
•	chamberAddressGeoLocation
•	visitfee
•	isActiveForSchedulilng
•	isChamberCurrentlyOpen

**/

        $doctors = Doctors::create([
            'userId'=> $user->id,
            'registrationNo'=>$data['registrationNo'],
            'educationalDegrees' => $data['educationalDegrees'],
            'specializationDepartment' => $data['specializationDepartment'],
            'chamberAddress' => $data['chamberAddress'],
            'chamberAddressGeoLocation' => '.999,.9999',
            'visitFee'=> '500',
            'isActiveForScheduling' => '0',
            'isChamberCurrentlyOpen' =>'0',

        ]);
        return $user;
    }
//    public function index()
//    {
//        return view('patient.register');
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
        return view('doctor.register');
    }
}
