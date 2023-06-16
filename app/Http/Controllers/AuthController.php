<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|min:5",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
            "password_confirmation" => "same:password"
        ]);

        $verify_code = rand(100000,999999);

        //mailing step
        logger("Your verify code is ".$verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password); //hash ဆိုတာ ကိုယ့်ရဲ့ password ကို encrypt လုပ်ပြီးသိမ်းတဲ့ php hash method
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->save();

        return redirect()->route("auth.login")->with("message","Register Successful");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function check(Request $request)
    {

        $request->validate([

            "email" => "required|email|exists:students,email",
            "password" => "required|min:8",

        ],[
            'email.exists' => "email or password is wrong"
        ]);

        $student = Student::where("email",$request->email)->first();
       if(!Hash::check($request->password,$student->password)){
        return redirect()->route("auth.login")->withErrors(["email" => "email or password is wrong"]);
       }

       session(["auth" => $student]);

        return redirect()->route("dashboard.home");
    }

    public function logout()
    {

        session()->forget("auth");

        return redirect()->route("auth.login");
    }

    public function passwordChange()
    {
        return view("auth.change-password");
    }

    public function passwordChanging(Request $request)
    {

        $request->validate([
            "current_password"=> "required|min:8", //  "current_password" hash နဲ့အပေါ်မှာသုံးပြီးစစ်ခဲ့သလိုပဲ user ရိုက်ထည့်ပေးတဲ့ဟာနဲ့ databaseထဲကဟာကို auto စစ်ပေး
            "password"=> "required|confirmed" // password ရိုက်ထည့်လိုက်ရင် တူမတူ စစ်ပေး

        ]);

        // checking current_password and auth_user_password
        if(!Hash::check($request->current_password, session('auth')->password)){
            return redirect()->back()->withErrors(["current_password" => "Password does not match"]);
        }

        // update new password
        $student = Student::find(session('auth')->id);
        $student->password = Hash::make($request->password);
        $student->update();

        //clear auth session
        session()->forget("auth");
        return redirect()->route("auth.login");


    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function verifying(Request $request)
    {

        $request->validate([
            "verify_code" => "required|numeric",
        ]);

        if($request->verify_code != session('auth')->verify_code){
            return redirect()->back()->withErrors(["verify_code" => "Incorrect Verify Code"]);
        }

        $student = Student::find(session('auth')->id);
        $student->email_verified_at = now();
        $student->update();

        session(['auth' => $student]); //email_verified_at ထည့်ပြီး session auth ထဲမှာ update ပြန်လုပ်ပေးမှ email verify စာကြောင်းကိုဖျောက်လို့ရမှာ

        return redirect()->route("dashboard.home");


    }

    public function forgot(){
        return view('auth.forgot');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            "email" => 'required|email|exists:students,email'
        ]);

        $student = Student::where("email",$request->email)->first();
        $link = route("auth.newPassword",["user_token" => $student->user_token]);

        logger("Your password reset link is ". $link);



        return redirect()->route("auth.login")->with("message","Your reset email link has been sent.");
    }

    public function newPassword()
    {
        $token = request()->user_token;
        $student = Student::where("user_token", $token)->first();

       if(is_null($student)){
        return abort(403,"You are not allowed");
       }


        return view('auth.new-password',['user_token'=>$token]);
    }

    public function resetPassword(Request $request)
    {

        $request->validate([
            "user_token"=> "required|exists:students,user_token",
            "password"=> "required|min:8|confirmed",
        ],[
            "user_token.exists" => " လွဲနေတယ်ဗျို့ "
        ]);

        $student = Student::where("user_token",$request->user_token)->first();
        $student->password = Hash::make($request->password);
        $student->user_token = md5(rand(100000,999999));
        $student->update();

        return redirect()->route('auth.login')->with("message","Password Updated");
    }
}
