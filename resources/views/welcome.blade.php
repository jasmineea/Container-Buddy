@extends('layouts.guest')
@section('content')
    <div class="container-fluid">
        <h1 class="text-3xl font-bold mb-4">Welcome to Container Buddy</h1>
        <p class="mb-4">Your go-to solution for managing containerized applications.</p>
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a> or
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a> to get started.
    </div>
@endsection