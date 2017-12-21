<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\User_activation;
use App\Patients;
use App\Doctors;
use App\Assistants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use App\SMS\SMSManager;
use Nexmo\Client\Exception\Exception;


class UserActivationController extends Controller
{

    protected $redirectTo = '/patient/activation';

//    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function sendActivationCode($user)
    {
        $user_activation = ($user->user_activation==null)? new User_activation: $user->user_activation;
        $activation_code = rand(100000, 999999);
        $user_activation->user_id = $user->id;
        $user_activation->token = $activation_code;


        try {
            $smsBody = 'Welcome, '.$user->name.' Your password changing code is '.$activation_code.'. Please activate your account http://127.0.0.1/user/activation. Thank You. ';
            $smsManager = new SMSManager();
            $smsManager->sendSMS($user->mobileNo, $smsBody);

        } catch (Exception $e) {

        }


        flash('Successfully, now please check your mobile for the activation code ')->success();

        $user_activation->save();



    }

    public function userActivate(Request $request){
        $this->validate($request, [
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/',
            'activation_code' => 'required|integer',
        ]);

        $user = User::where('mobileNo', $request->mobileNo)->first();
        if($user == null){
            flash('There is no user with this number!')->error();
            return redirect()->route('user.activation');
//            return "There is no user with this number!";
        }
        if($user->isActivated){
            flash('Your account is already activated!')->warning();
            return redirect()->route('user.activation');
//            return "Your account is already activated!";
        }

        $user_activation = $user->user_activation;
        if($user_activation==null || $user_activation->token!=$request->activation_code || strtotime($user_activation->created_at) + 60*60*24 < time()){
            flash('Invalid activation code.Check mobile phone for activation code. Or resend activation code')->error();
            return redirect()->route('user.activation');
//            return "Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code";

        }

        $user->isActivated=true;
        if($user->role=="Patient"){
            $user->isValid=true;
        }
        $user->save();

//        this->guard()->login($user);
        return redirect()-> route('login');


    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/',
            'activation_code' => 'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('mobileNo', $request->mobileNo)->first();
        if($user == null){
            flash('There is no user with this number!')->error();
//            return redirect()->route('user.activation');
            return "There is no user with this number!";
        }

        $user_activation = $user->user_activation;
        if($user_activation==null ||
            $user_activation->token!=$request->activation_code ||
            strtotime($user_activation->created_at) + 60*60*24 < time()){
            flash('Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code')->error();
//            return redirect()->route('user.activation');
            return "Invalid activation code.Check your email and mobile phone for activation code. Or resend activation code";

        }

        $user->password = bcrypt($request->password);
        $user->isActivated = true;

        $user->save();

        return redirect()-> route('login');



    }



    public function showActivationForm(){
        return view('auth.user_activation');
    }

    public function showResendActivationCodeForm(){
        return view('auth.resend_activation_code');
    }

    public function showResendActivationCodeForgetPasswordForm(){
        return view('auth.resend_activation_code_forget_password');
    }

    public function showChangePasswordForm(){
        return view('auth.change_password');
    }




    public function activationCodeSend(Request $request){
        $this->validate($request, [
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        $user = User::where('mobileNo', $request->mobileNo)->first();
        if($user == null){
            flash('There is no user with this mobile no!')->error();
            return redirect()->route('user.send_activation_code');
        }
//        $user->is_activated = false;
//        $user->save();

        $this->sendActivationCode($user);
        flash('Activation code has been successfully sent to your mail and mobile!');
        return redirect()->route('user.activation');

    }

    public function forgetPasswordCodeSend(Request $request){
        $this->validate($request, [
            'mobileNo' => 'required|regex:/(01)[0-9]{9}/',
        ]);

        $user = User::where('mobileNo', $request->mobileNo)->first();
        if($user == null){
            flash('There is no user with your email!')->error();
            return redirect()->route('user.forget_password_code');
        }
//        $user->is_activated = false;
//        $user->save();

        $this->sendActivationCode($user);
        flash('Activation code has been successfully sent to your mail and mobile!');
        return redirect()->route('user.change_password');

    }

//    public function index()
//    {
//        return view('patient.register');
//    }
//    public function success()
//    {
//        return view('success');
//    }



}
