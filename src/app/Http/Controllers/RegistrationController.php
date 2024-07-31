<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Rules\ReCaptchaV3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    //
    public function index()
    {
//        die("hello");
//        Mail::to('rajas.bit@gmail.com')->send(new SendMailCode());
        dispatch(new SendEmailJob());
        echo "Sent";
    }

    public function getOtp()
    {
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        return $otp;
    }

    public function register()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return view('Register.register');
    }

    public function registered(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $otp = $this->getOtp();
        Redis::setex("otp:$email", 300, $otp);

        dispatch(new SendEmailJob($email, $otp));
        return view('Register.verify', compact('otp', 'email'));
    }

    public function verify(Request $request)
    {
        $email = $request->input('email');
        $request->session()->put('loginId', $email);
        echo "Challenge completed successfully!";
        echo "<br>";
        echo $request->session()->get('loginId')." is logged in";
    }

    public function captcha(Request $request)
    {
        echo "Challenge completed successfully!";
    }
}
