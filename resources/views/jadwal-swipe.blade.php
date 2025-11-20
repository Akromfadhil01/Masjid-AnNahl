 @extends('layouts.app')

@section('title', 'Jadwal Sholat - Mobile Swipe')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<section class="text-center py-5 bg-gradient" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white;">
    <h1 class="fw-bold">🕌 Jadwal Sholat Hari Ini</h1>
    <p>{{ $prayerTime->location ?? '-' }}</p>
</section>

@if($prayerTime)
<div class="swiper mySwiper py-5">
    <div class="swiper-wrapper">
        @foreach ([
            ['Imsak', $prayerTime->imsak, 'bi-sunrise', 'bg-primary'],
            ['Subuh', $prayerTime->subuh, 'bi-moon-stars', 'bg-success'],
            ['Dzuhur', $prayerTime->dzuhur, 'bi-sun', 'bg-warning'],
            ['Ashar', $prayerTime->ashar, 'bi-cloud-sun', 'bg-info'],
            ['Maghrib', $prayerTime->maghrib, 'bi-sunset', 'bg-danger'],
            ['Isya', $prayerTime->isya, 'bi-moon', 'bg-secondary'],
        ] as $item)
        <div class="swiper-slide">
            <div class="card border-0 shadow p-4 text-center mx-auto" style="width: 80%; border-radius: 1rem;">
                <div class="{{ $item[3] }} bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                    <i class="bi {{ $item[2] }} fs-2 text-{{ explode('-', $item[3])[1] }}"></i>
                </div>
                <h5 class="text-muted mb-1">{{ $item[0] }}</h5>
                <h2 class="fw-bold">{{ $item[1] }}</h2>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-3"></div>
</div>

<script>
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: { el: ".swiper-pagination" },
        breakpoints: { 768: { slidesPerView: 3 } }
    });
</script>
@endif
@endsection
