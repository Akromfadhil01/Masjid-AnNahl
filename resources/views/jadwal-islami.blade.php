@extends('layouts.app')

@section('title', 'Jadwal Sholat - Tema Islami')

@section('content')
<style>
    body {
        background: url('https://images.unsplash.com/photo-1562004760-aceed7bb0dcd?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
    }
    .overlay {
        background-color: rgba(0,0,0,0.6);
        padding: 80px 0;
        color: white;
    }
    .card-custom {
        backdrop-filter: blur(10px);
        background-color: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 1rem;
        color: white;
    }
</style>

<div class="overlay text-center">
    <h1 class="fw-bold mb-2">🕌 Jadwal Sholat</h1>
    <p>{{ $prayerTime->location ?? '-' }}</p>
</div>

@if($prayerTime)
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        @foreach ([
            'Imsak' => $prayerTime->imsak,
            'Subuh' => $prayerTime->subuh,
            'Dzuhur' => $prayerTime->dzuhur,
            'Ashar' => $prayerTime->ashar,
            'Maghrib' => $prayerTime->maghrib,
            'Isya' => $prayerTime->isya
        ] as $name => $time)
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-custom text-center p-3">
                <h6>{{ $name }}</h6>
                <h3 class="fw-bold">{{ $time }}</h3>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <button class="btn btn-light px-4 py-2" onclick="playAzan()">🔔 Putar Suara Azan</button>
        <audio id="azanAudio" src="https://download.quranicaudio.com/quran/azan/azan1.mp3"></audio>
    </div>
</div>

<script>
    function playAzan() {
        document.getElementById('azanAudio').play();
    }
</script>
@endif
@endsection
