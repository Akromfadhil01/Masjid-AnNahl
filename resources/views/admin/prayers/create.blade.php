@extends('admin.layouts.app')

@section('title', 'Tambah Jadwal Salat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Tambah Jadwal Salat</h2>
    <a href="{{ route('admin.prayers.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.prayers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="city" class="form-label">Kota</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Contoh: Jakarta" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="row">
                @foreach(['fajr' => 'Subuh', 'dhuhr' => 'Dzuhur', 'asr' => 'Ashar', 'maghrib' => 'Maghrib', 'isha' => 'Isya'] as $field => $label)
                    <div class="col-md-6 mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" placeholder="Contoh: 04:30">
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.prayers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
