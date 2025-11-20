@extends('layouts.app')

@section('title', 'Profil - Masjid Al Muta\'allimin')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Profil Masjid</h1>
                <p class="lead">Mengenal lebih dekat Masjid Al Muta'allimin Fakultas Teknik Untirta</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=800" 
                     alt="Masjid Al Muta'allimin" 
                     class="img-fluid rounded-3 shadow-lg">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Tentang Masjid</h2>
                <p class="text-muted mb-4">
                    Masjid Al Muta'allimin Fakultas Teknik Untirta diresmikan pada 14 Februari 2025 dan mampu menampung hingga 780 jamaah. Masjid ini menjadi pusat ibadah, kajian, dan pembinaan rohani civitas akademika, sekaligus sarana membangun keseimbangan antara spiritualitas dan akademik.
                </p>
                <p class="text-muted">
                    Dengan fasilitas yang lengkap dan nyaman, masjid ini diharapkan dapat menjadi tempat yang kondusif untuk beribadah, menuntut ilmu, dan mempererat tali silaturahmi antar civitas akademika Universitas Sultan Ageng Tirtayasa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle p-3 me-3">
                                <i class="bi bi-eye fs-4"></i>
                            </div>
                            <h3 class="mb-0">Visi</h3>
                        </div>
                        <p class="text-muted mb-0">
                            Menjadi pusat ibadah dan pengembangan iman-ilmu di Universitas Sultan Ageng Tirtayasa yang mampu mencetak generasi yang berakhlak mulia, cerdas, dan berdaya saing.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle p-3 me-3">
                                <i class="bi bi-bullseye fs-4"></i>
                            </div>
                            <h3 class="mb-0">Misi</h3>
                        </div>
                        <ul class="text-muted mb-0">
                            <li class="mb-2">Memfasilitasi kegiatan ibadah yang khusyuk dan berkualitas</li>
                            <li class="mb-2">Menyelenggarakan kajian dan pembinaan keislaman</li>
                            <li class="mb-2">Membangun kebersamaan dan silaturahmi civitas akademika</li>
                            <li>Mengintegrasikan nilai-nilai Islam dalam kehidupan akademik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Fasilitas Masjid</h2>
            <p class="text-muted">Berbagai fasilitas untuk kenyamanan jamaah</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-building fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title">Ruang Shalat</h5>
                        <p class="text-muted mb-0">Ruang shalat utama yang luas dan nyaman dengan kapasitas 780 jamaah</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-droplet fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title">Tempat Wudhu</h5>
                        <p class="text-muted mb-0">Fasilitas tempat wudhu yang bersih dan memadai untuk jamaah</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-door-open fs-1 text-info"></i>
                        </div>
                        <h5 class="card-title">Toilet</h5>
                        <p class="text-muted mb-0">Toilet bersih dan terawat untuk kenyamanan jamaah</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-grid-3x3 fs-1 text-warning"></i>
                        </div>
                        <h5 class="card-title">Ruang Serbaguna</h5>
                        <p class="text-muted mb-0">Ruangan untuk kajian, diskusi, dan kegiatan keislaman</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-danger bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-people fs-1 text-danger"></i>
                        </div>
                        <h5 class="card-title">Ruang DKM</h5>
                        <p class="text-muted mb-0">Ruang khusus untuk pengurus DKM dalam mengelola masjid</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-custom text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-secondary bg-opacity-10 rounded-circle p-4 d-inline-flex mb-3">
                            <i class="bi bi-car-front fs-1 text-secondary"></i>
                        </div>
                        <h5 class="card-title">Area Parkir</h5>
                        <p class="text-muted mb-0">Area parkir yang luas dan aman untuk kendaraan jamaah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card card-custom border-primary border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-primary mb-2">780</h2>
                        <p class="text-muted mb-0">Kapasitas Jamaah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-success border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-success mb-2">2025</h2>
                        <p class="text-muted mb-0">Tahun Peresmian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-warning border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-warning mb-2">5+</h2>
                        <p class="text-muted mb-0">Kegiatan Rutin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-info border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-info mb-2">100%</h2>
                        <p class="text-muted mb-0">Untuk Umum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Lokasi Masjid</h2>
            <p class="text-muted">Jl. Jenderal Sudirman KM 3, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten 42435</p>
        </div>
        
        <div class="card card-custom">
            <div class="card-body p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2607240453586!2d106.02115!3d-6.2281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnNDEuMiJTIDEwNsKwMDEnMTYuMSJF!5e0!3m2!1sid!2sid!4v1234567890" 
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection