<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function username(){

        return 'mobileNo';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
           // $this->credentials($request) + ["isActivated" => true],["isValid"=>false],
//            $this->credentials($request) + ["isActivated" => true, "isValid"=> true],
            $this->credentials($request) + ["isActivated" => true],

            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('Login failed: make sure your account is Activated')],
        ]);
    }

    protected function authenticated(Request $request, $user)
    {

        if( Auth::user()->role == 'Doctor'){
            flash('Successfully logged in')->success();
            return Redirect()->route('doctor.dashboard');
        }

        if( Auth::user()->role  == 'Patient' ){

            return Redirect()->route('patient.dashboard');
        }

        if( Auth::user()->role == 'Assistant' ){
            flash('Successfully logged in')->success();
            return Redirect()->route('assistant.dashboard');
        }

        if( Auth::user()->role == 'Admin' ){
            flash('Successfully logged in')->success();
            return Redirect()->route('admin.verifyDoctors');
        }


        }
}
