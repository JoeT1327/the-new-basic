<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\CheckPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            "name" => "required|min:5",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8|confirmed",

        ]);

        // return $request;

        $verify_code = rand(100000, 999999);

        //mailing step
        logger("Your verify code is " . $verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password); //hash ဆိုတာ ကိုယ့်ရဲ့ password ကို encrypt လုပ်ပြီးသိမ်းတဲ့ php hash method
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->api_token = md5(rand(100000, 999999));
        $student->save();

        return response()->json([
            "message" => "Your Registration Is Successful"
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([

            "email" => "required|email|exists:students,email",
            "password" => ["required", "min:8", new CheckPassword],

        ], [
            'email.exists' => "email or password is wrong"
        ]);

        // return $request;

        $student = Student::where("email", $request->email)->first();


        session(["auth" => $student]);

       return response()->json([
        "message" => "Login Successful",
        "info" => $student,
        "api_token" => $student->api_token
       ]);
    }

    public function logout(Request $request)
    {
        // အရင် login ဝင်ခဲ့တုန်းက api_token နဲ့ထပ်ပြီး bearer သုံးလို့မရတော့အောင် update လုပ်
        $student = Student::find(session('auth')->id);
        $student->api_token = md5(rand(100000, 999999));
        $student->update();

       session()->forget('auth');
       return response()->json([
        "message" => 'Logout Successful'
       ]);
    }
}
