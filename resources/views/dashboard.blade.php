@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded">
                <div class="card-body">
                    <h4 class="card-title">Welcome to Container Buddy</h4>
                    <p class="card-text">
                        You're logged in as <strong>{{ $user ? $user->name : 'Unknown User' }}</strong>
                    </p>

                    <a href="{{ route('logout') }}" class="btn btn-outline-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
