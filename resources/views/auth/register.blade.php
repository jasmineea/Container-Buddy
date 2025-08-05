@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="text-center mb-4">Register for Container Buddy</h3>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                @error('email')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success w-100">Create Account</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Already have an account? Login</a>
            </div>
        </div>
    </div>
</div>
@endsection


