<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Forgot Password'
        ];
        return view('auth.forgot-password', $data);
    }

    public function action()
    {
        //
    }
}
