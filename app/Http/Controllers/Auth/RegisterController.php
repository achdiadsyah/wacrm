<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin'  => 0,
            'is_active'  => 1,
        ]);

        return redirect()->route('auth.login')->with([
            'text' => 'Your data is successfully registered, check your email to verify account',
            'icon' => 'success',
        ]);

    }
}
