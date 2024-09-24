@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Verify Your Email Address</h2>
        <p>A verification link has been sent to your email address. Please check your inbox.</p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Resend Verification Email</button>
        </form>
    </div>
@endsection
