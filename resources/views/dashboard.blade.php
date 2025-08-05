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

                    <h2>Tags Fired Today: {{ $todayCount }}</h2>
<h2>Active Containers: {{ $activeContainers }}</h2>
<h2>Anomalies Detected: {{ $anomalies }}</h2>
<h2>Last Update: {{ \Carbon\Carbon::parse($lastUpdate)->diffForHumans() }}</h2>

<canvas id="tagFireChart"></canvas>



                    <a href="{{ route('logout') }}" class="btn btn-outline-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = {
  labels: [...Array(24).keys()],
  datasets: [
    {
      label: 'Client-side',
      data: @json(array_column($tagFireActivity['client']->toArray(), 'count')),
      borderColor: 'blue',
    },
    {
      label: 'Server-side',
      data: @json(array_column($tagFireActivity['server']->toArray(), 'count')),
      borderColor: 'green',
    }
  ]
};

new Chart(document.getElementById('tagFireChart'), {
  type: 'line',
  data: data,
});
</script>
@endsection
