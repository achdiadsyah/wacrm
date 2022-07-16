@extends('layouts.auth')
@push('head-script')
<link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
@endpush
@section('content')
<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="{{route('homepage')}}"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo"></a>
        </div>
        <h1 class="auth-title">Sign Up</h1>
        <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

        <form action="{{route('auth.do-register')}}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Email" name="email" required>
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" required>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Confirm Password" name="password_confirm" required>
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Already have an account? <a href="{{route('auth.login')}}" class="font-bold">Login</a>.</p>
        </div>
    </div>
</div>
<div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">

    </div>
</div>
@endsection
@push('foot-script')
    
@endpush