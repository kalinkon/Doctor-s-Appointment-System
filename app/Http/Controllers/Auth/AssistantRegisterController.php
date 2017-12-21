<?php

namespace App\Http\Controllers\Auth;
use App\User_activation;
use App\User;
use App\Assistants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\SMS\SMSManager;
use Nexmo\Client\Exception\Exception;

class AssistantRegisterController extends Controller
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
    protected $redirectTo = '/user/activation';

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
//            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/|unique:users',

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
            'role' => 'Assistant',
            'gender'=> $data['gender'],
            'mobileNo' => $data['mobileNo'],
            'password' => bcrypt($data['password']),
            'isActivated'=> false,
            'isValid'=> false,


        ]);

//        $user = User::create([
//            'user_name' => $data['user_name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);


        $assistants = Assistants::create([
            'user_id'=> $user->id,
            'doctor_id'=>$data['doctorId'],
            'address' => $data['address'],
            'education'=> $data['education'],
            'isActive'=>true,

        ]);
        $this->sendActivationCode($user);
        return $user;
    }

    public function sendActivationCode($user)
    {
        $user_activation = ($user->user_activation==null)? new User_activation: $user->user_activation;
        $activation_code = rand(100000, 999999);
        $user_activation->user_id = $user->id;
        $user_activation->token = $activation_code;
        $user_activation->save();

//        $array=['name' => $user->first_name, 'token' => $activation_code];
//        Mail::to($user->email)->queue(new EmailVerification($array));

        try {
            $smsBody = 'Welcome, '.$user->name.' Your Activation code is '.$activation_code.'. Please activate your account http://127.0.0.1/user/activation. Thank You. ';
            $smsManager = new SMSManager();
            $smsManager->sendSMS($user->mobileNo, $smsBody);

        } catch (Exception $e) {

        }

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
        flash('Successfully enrolled to the system, now please check your mobile for the activation code ')->success();
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm()
    {
        return view('assistant.register');
    }
}
