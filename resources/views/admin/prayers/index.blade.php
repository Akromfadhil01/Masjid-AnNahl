@extends('admin.layouts.app')

@section('title', 'Kelola Jadwal Salat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Jadwal Salat</h2>
    <a href="{{ route('admin.prayers.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Jadwal
    </a>
</div>

<form action="{{ route('admin.prayers.refresh') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-warning">
        <i class="bi bi-arrow-repeat"></i> Refresh Otomatis
    </button>
</form>

<div class="card">
    <div class="card-body">
        @if($schedules->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kota</th>
                            <th>Tanggal</th>
                            <th>Subuh</th>
                            <th>Dzuhur</th>
                            <th>Ashar</th>
                            <th>Maghrib</th>
                            <th>Isya</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $index => $schedule)
                            <tr>
                                <td>{{ $schedules->firstItem() + $index }}</td>
                                <td>{{ $schedule->city }}</td>
                                <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</td>
                                <td>{{ $schedule->fajr }}</td>
                                <td>{{ $schedule->dhuhr }}</td>
                                <td>{{ $schedule->asr }}</td>
                                <td>{{ $schedule->maghrib }}</td>
                                <td>{{ $schedule->isha }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.prayers.edit', $schedule->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.prayers.destroy', $schedule->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $schedules->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Jadwal Salat</h5>
                <p class="text-muted">Klik tombol "Tambah Jadwal" untuk menambah data baru</p>
                <a href="{{ route('admin.prayers.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle"></i> Tambah Jadwal
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
