@extends('admin.layouts.app')

@section('title', 'Kelola Rekening Donasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Rekening Donasi</h2>
    <a href="{{ route('admin.donations.create') }}" class="btn btn-danger">
        <i class="bi bi-plus-circle"></i> Tambah Rekening
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($donations->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="25%">Bank</th>
                            <th width="30%">Nomor Rekening</th>
                            <th width="25%">Nama Pemilik</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $index => $donation)
                            <tr>
                                <td>{{ $donations->firstItem() + $index }}</td>
                                <td>
                                    <strong>{{ $donation->bank }}</strong>
                                </td>
                                <td>
                                    <code class="fs-6">{{ $donation->nomor_rekening }}</code>
                                </td>
                                <td>{{ $donation->nama_pemilik }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.donations.edit', $donation->id) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.donations.destroy', $donation->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus rekening ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Hapus">
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

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $donations->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Rekening Donasi</h5>
                <p class="text-muted">Klik tombol "Tambah Rekening" untuk menambah data pertama</p>
                <a href="{{ route('admin.donations.create') }}" class="btn btn-danger mt-2">
                    <i class="bi bi-plus-circle"></i> Tambah Rekening
                </a>
            </div>
        @endif
    </div>
</div>
@endsection