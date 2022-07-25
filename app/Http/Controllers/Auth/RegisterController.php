<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Validator;
use Mail; 
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth.register', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email:rfc,filter', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirm' => ['required', 'string', 'min:8','same:password'],
        ]);

    }
    
    public function action(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin'  => 0,
            'is_active'  => 0,
        ]);

        $token = Str::random(64);
  
        $verifyData = UserVerify::create([
            'user_id' => $user->id, 
            'token' => $token
        ]);
  
        $sendMail = Mail::send('email.verify-template', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        if($user && $verifyData && $sendMail){
            return redirect()->route('auth.login')->with([
                'text' => 'Your data is successfully registered, check your email to verify account',
                'icon' => 'success',
            ]);
        } else {
            return redirect()->route('auth.login')->with([
                'text' => 'Something was wrong while registering your data',
                'icon' => 'warning',
            ]);
        }
    }

    public function verify($token)
    {

        $verifyUser = UserVerify::where('token', $token)->first();
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if($user->email_verified_at == NULL) {
                $verifyUser->user->email_verified_at = date('Y-m-d h:i:s');
                $verifyUser->user->is_active = 1;
                $verifyUser->user->save();
                return redirect()->route('auth.login')->with([
                    'text' => 'Your email is verified, now you can login',
                    'icon' => 'success',
                ]);
            } else {
                return redirect()->route('auth.login')->with([
                    'text' => 'Your email is already verified',
                    'icon' => 'success',
                ]);
            }
        }
  
        return redirect()->route('auth.login')->with([
            'text' => 'Sorry your email cannot be identified.',
            'icon' => 'error',
        ]);
    }
}
