@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Kelola Berita</h2>
    <a href="{{ route('admin.news.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Berita
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($news->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Gambar</th>
                            <th width="30%">Judul</th>
                            <th width="30%">Ringkasan</th>
                            <th width="15%">Tanggal</th>
                            <th width="10%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $index => $item)
                            <tr>
                                <td>{{ $news->firstItem() + $index }}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" 
                                             alt="{{ $item->title }}" 
                                             class="rounded"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($item->excerpt, 60) }}</small>
                                </td>
                                <td>
                                    <i class="bi bi-calendar3 text-primary"></i>
                                    {{ \Carbon\Carbon::parse($item->published_date)->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.news.edit', $item->id) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #cbd5e1;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Berita</h5>
                <p class="text-muted">Klik tombol "Tambah Berita" untuk menambah data pertama</p>
                <a href="{{ route('admin.news.create') }}" class="btn btn-success mt-2">
                    <i class="bi bi-plus-circle"></i> Tambah Berita
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
