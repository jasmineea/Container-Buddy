@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="text-center mb-4">Login to Container Buddy</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                @error('email')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">Don't have an account? Register</a>
            </div>
        </div>
    </div>
</div>
@endsection


