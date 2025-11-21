@extends('admin.layouts.app')

@section('title', 'Edit Profil Masjid')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit Profil Masjid</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Tentang Masjid -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-building text-primary me-2"></i>Tentang Masjid
                </h5>
                
                <div class="mb-3">
                    <label class="form-label">Gambar Tentang Masjid</label>
                    <input type="file" name="about_image" class="form-control" accept="image/*">
                    @if(!empty($profile->about_image))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $profile->about_image) }}" 
                                 class="rounded" 
                                 style="width: 200px; height: 150px; object-fit: cover;"
                                 alt="Gambar Masjid">
                            <p class="text-muted small mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Tentang Masjid (Bagian 1)</label>
                    <textarea name="about_text_1" class="form-control" rows="4" 
                              placeholder="Tuliskan deskripsi tentang masjid...">{{ $profile->about_text_1 ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Tentang Masjid (Bagian 2)</label>
                    <textarea name="about_text_2" class="form-control" rows="4" 
                              placeholder="Tuliskan deskripsi tambahan tentang masjid...">{{ $profile->about_text_2 ?? '' }}</textarea>
                </div>
            </div>

            <hr>

            <!-- Visi & Misi -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-bullseye text-primary me-2"></i>Visi & Misi
                </h5>
                
                <div class="mb-3">
                    <label class="form-label">Visi Masjid</label>
                    <textarea name="visi" class="form-control" rows="3" 
                              placeholder="Tuliskan visi masjid...">{{ $profile->visi ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Misi Masjid</label>
                    <textarea name="misi" class="form-control" rows="3" 
                              placeholder="Tuliskan misi masjid...">{{ $profile->misi ?? '' }}</textarea>
                </div>
            </div>

            <hr>

            <!-- Statistik Masjid -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-graph-up text-primary me-2"></i>Statistik Masjid
                </h5>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kapasitas Jamaah</label>
                        <input type="number" name="capacity" class="form-control" 
                               value="{{ $profile->capacity ?? '' }}" 
                               placeholder="Contoh: 500">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tahun Berdiri</label>
                        <input type="number" name="year" class="form-control" 
                               value="{{ $profile->year ?? '' }}" 
                               placeholder="Contoh: 1990">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kegiatan Rutin</label>
                    <input type="text" name="routine_activities" class="form-control" 
                           value="{{ $profile->routine_activities ?? '' }}" 
                           placeholder="Contoh: Pengajian Mingguan, TPQ, dll">
                </div>

                <div class="mb-3">
                    <label class="form-label">Informasi Publik</label>
                    <input type="text" name="public_info" class="form-control" 
                           value="{{ $profile->public_info ?? '' }}" 
                           placeholder="Contoh: Terbuka untuk umum">
                </div>
            </div>

            <hr>

            <!-- Kontak -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-telephone text-primary me-2"></i>Kontak
                </h5>
                
                <div class="mb-3">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp" class="form-control" 
                           value="{{ $profile->whatsapp ?? '' }}" 
                           placeholder="Contoh: 6281234567890">
                    <div class="form-text">Masukkan nomor tanpa tanda + atau spasi</div>
                </div>
            </div>

            <hr>

            <!-- Lokasi & Maps -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-geo-alt text-primary me-2"></i>Lokasi & Maps
                </h5>
                
                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="address" class="form-control" rows="3" 
                              placeholder="Tuliskan alamat lengkap masjid...">{{ $profile->address ?? 'Jl. Jenderal Sudirman KM 3, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten 42435, Indonesia' }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Embed Google Maps</label>
                    <textarea name="maps_embed" class="form-control" rows="4" 
                              placeholder="Paste kode embed Google Maps di sini...">{{ $profile->maps_embed ?? '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.037200799374!2d106.1504741750117!3d-6.125511993865611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418adaa4f7f563%3A0x950ec58123df8596!2sUniversitas%20Sultan%20Ageng%20Tirtayasa%20(UNTIRTA)%20Kampus%20Cilegon!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' }}</textarea>
                    <div class="form-text">Copy embed code dari Google Maps dan paste di sini</div>
                </div>
            </div>

            <hr>

            <!-- Fasilitas -->
            <div class="mb-4">
                <h5 class="card-title mb-3">
                    <i class="bi bi-building text-primary me-2"></i>Fasilitas Masjid
                </h5>
                
                <div id="facilities-container">
                    @php
                        $facilities = $profile->facilities ?? [
                            ['name' => 'Ruang Shalat', 'icon' => 'bi-building', 'description' => 'Ruang shalat utama yang luas dan nyaman'],
                            ['name' => 'Tempat Wudhu', 'icon' => 'bi-droplet', 'description' => 'Fasilitas tempat wudhu yang bersih dan memadai'],
                            ['name' => 'Toilet', 'icon' => 'bi-door-open', 'description' => 'Toilet bersih dan terawat untuk kenyamanan jamaah'],
                            ['name' => 'Ruang Serbaguna', 'icon' => 'bi-grid-3x3', 'description' => 'Ruangan untuk kajian, diskusi, dan kegiatan keislaman'],
                            ['name' => 'Ruang DKM', 'icon' => 'bi-people', 'description' => 'Ruang khusus untuk pengurus DKM dalam mengelola masjid'],
                            ['name' => 'Area Parkir', 'icon' => 'bi-car-front', 'description' => 'Area parkir yang luas dan aman untuk kendaraan jamaah']
                        ];
                    @endphp
                    
                    @foreach($facilities as $index => $facility)
                    <div class="facility-item border rounded p-3 mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Nama Fasilitas</label>
                                <input type="text" name="facility_name[]" class="form-control" 
                                       value="{{ $facility['name'] }}" placeholder="Contoh: Ruang Shalat">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Icon</label>
                                <select name="facility_icon[]" class="form-select">
                                    <option value="bi-building" {{ $facility['icon'] == 'bi-building' ? 'selected' : '' }}>Gedung</option>
                                    <option value="bi-droplet" {{ $facility['icon'] == 'bi-droplet' ? 'selected' : '' }}>Air Wudhu</option>
                                    <option value="bi-door-open" {{ $facility['icon'] == 'bi-door-open' ? 'selected' : '' }}>Toilet</option>
                                    <option value="bi-grid-3x3" {{ $facility['icon'] == 'bi-grid-3x3' ? 'selected' : '' }}>Ruang</option>
                                    <option value="bi-people" {{ $facility['icon'] == 'bi-people' ? 'selected' : '' }}>Orang</option>
                                    <option value="bi-car-front" {{ $facility['icon'] == 'bi-car-front' ? 'selected' : '' }}>Parkir</option>
                                    <option value="bi-book" {{ $facility['icon'] == 'bi-book' ? 'selected' : '' }}>Buku</option>
                                    <option value="bi-mic" {{ $facility['icon'] == 'bi-mic' ? 'selected' : '' }}>Sound System</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" name="facility_description[]" class="form-control" 
                                       value="{{ $facility['description'] }}" placeholder="Deskripsi singkat">
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-facility" {{ $index == 0 ? 'disabled' : '' }}>
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <button type="button" id="add-facility" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Fasilitas
                </button>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript untuk fasilitas -->
<script>
document.getElementById('add-facility').addEventListener('click', function() {
    const container = document.getElementById('facilities-container');
    const newItem = document.createElement('div');
    newItem.className = 'facility-item border rounded p-3 mb-3';
    newItem.innerHTML = `
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Nama Fasilitas</label>
                <input type="text" name="facility_name[]" class="form-control" placeholder="Contoh: Ruang Shalat">
            </div>
            <div class="col-md-3">
                <label class="form-label">Icon</label>
                <select name="facility_icon[]" class="form-select">
                    <option value="bi-building">Gedung</option>
                    <option value="bi-droplet">Air Wudhu</option>
                    <option value="bi-door-open">Toilet</option>
                    <option value="bi-grid-3x3">Ruang</option>
                    <option value="bi-people">Orang</option>
                    <option value="bi-car-front">Parkir</option>
                    <option value="bi-book">Buku</option>
                    <option value="bi-mic">Sound System</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="facility_description[]" class="form-control" placeholder="Deskripsi singkat">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-facility">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
});

// Remove facility
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-facility')) {
        e.target.closest('.facility-item').remove();
    }
});
</script>
@endsection