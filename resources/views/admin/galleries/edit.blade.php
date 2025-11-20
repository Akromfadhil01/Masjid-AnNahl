@extends('admin.layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit Galeri</h2>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul Foto <span class="text-danger">*</span></label>
                <input type="text" 
                       class="form-control @error('title') is-invalid @enderror" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $gallery->title) }}"
                       placeholder="Contoh: Kegiatan Kajian Subuh"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Foto Baru</label>
                
                @if($gallery->image)
                    <div class="mb-3">
                        <p class="small text-muted mb-2">Foto saat ini:</p>
                        <img src="{{ Storage::url($gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             class="img-thumbnail"
                             style="max-width: 300px;">
                    </div>
                @endif
                
                <input type="file" 
                       class="form-control @error('image') is-invalid @enderror" 
                       id="image" 
                       name="image"
                       accept="image/*"
                       onchange="previewImage(event)">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                
                <!-- Image Preview -->
                <div class="mt-3" id="imagePreview" style="display: none;">
                    <p class="small text-muted mb-2">Preview Foto Baru:</p>
                    <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush