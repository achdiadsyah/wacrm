<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth.login', $data);
    }

    public function action(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:rfc,filter', 'max:255'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->remember ? true : false;
 
        if (Auth::attempt($credentials, $remember)) {
            dd(Auth);
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with([
                'text' => 'You have entered invalid credentials',
                'icon' => 'info',
            ]);
        }
    }
}
