@extends('layouts.auth')
@push('head-script')
<link rel="stylesheet" href="assets/css/pages/error.css">
@endpush
@section('content')
<div id="error">
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img class="img-error" src="{{ asset('assets/images/samples/error-403.svg') }}" alt="Not Found">
                <h1 class="error-title">Check Your Email</h1>
                <p class="fs-5 text-gray-600">You are unauthorized to see this page because your account is not verified</p>
                <a href="{{route('auth.do-logout')}}" class="btn btn-lg btn-outline-danger mt-3">Logout</a>
                <a href="{{route('dashboard')}}" class="btn btn-lg btn-outline-primary mt-3">I'm Done Verify</a>
            </div>
        </div>
    </div>
</div>
@endsection