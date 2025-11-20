@extends('layouts.app')

@section('title', 'Jadwal Sholat - Dark Mode')

@section('content')
<style>
    body {
        background-color: #0d1117;
        color: #e6edf3;
    }
    .hero-section {
        background: linear-gradient(135deg, #1f2937, #111827);
        padding: 80px 0;
        color: #e6edf3;
    }
    .card-custom {
        background-color: #161b22;
        border: 1px solid #30363d;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }
    .card-custom:hover {
        background-color: #1d242d;
        transform: translateY(-4px);
    }
    .text-muted {
        color: #9ca3af !important;
    }
</style>

<section class="hero-section text-center">
    <h1 class="fw-bold mb-2">🕋 Jadwal Sholat Hari Ini</h1>
    <p class="text-muted">{{ $prayerTime->location ?? '-' }}</p>
</section>

@if($prayerTime)
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        @foreach ([
            'Imsak' => 'sunrise',
            'Subuh' => 'moon-stars',
            'Dzuhur' => 'sun',
            'Ashar' => 'cloud-sun',
            'Maghrib' => 'sunset',
            'Isya' => 'moon'
        ] as $name => $icon)
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-custom text-center p-3">
                <i class="bi bi-{{ $icon }} fs-2 mb-2 text-primary"></i>
                <h6 class="text-muted mb-1">{{ $name }}</h6>
                <h3 class="fw-bold">{{ strtolower($name) === 'dzuhur' ? $prayerTime->dzuhur : $prayerTime->{strtolower($name)} }}</h3>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
