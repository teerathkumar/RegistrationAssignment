<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $email = "rajas.bit@gmail.com";//$request->input('email');
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        // Store OTP in Redis with a 5-minute expiration
        Redis::setex("otp:$email", 300, $otp);
        dispatch(new SendEmailJob($email, $otp));
        return response()->json(['message' => 'OTP sent successfully']);
    }
}
