@extends('layouts.app')

@section('title', 'Jadwal Sholat')

@section('content')
<div class="container py-5 text-center">
    <h2 class="text-success mb-4 fw-bold">🕌 Jadwal Sholat Hari Ini</h2>

    <div class="card shadow-lg border-0 rounded-4 p-4 bg-light">
        <div class="row g-4 justify-content-center">
            @foreach($data as $key => $time)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 bg-white rounded-4 shadow-sm p-3">
                        <h6 class="text-muted mb-1">{{ ucfirst(strtolower($key)) }}</h6>
                        <h4 class="fw-bold text-success">{{ $time }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('jadwal.sholat') }}" class="btn btn-success rounded-pill">
            🔄 Refresh Jadwal
        </a>
    </div>
</div>
@endsection
