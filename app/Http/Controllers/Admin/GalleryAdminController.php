<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryAdminController extends Controller
{
    /**
     * Tampilkan semua galeri
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(8);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Tampilkan form tambah galeri
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Simpan galeri baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Simpan gambar ke storage
        $path = $request->file('image')->store('galleries', 'public');

        // Simpan ke database
        Gallery::create([
            'title' => $validated['title'],
            'image' => $path,
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit galeri
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update data galeri
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $path = $gallery->image; // Default: gunakan gambar lama

        // Jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('galleries', 'public');
        }

        // Update data galeri
        $gallery->update([
            'title' => $validated['title'],
            'image' => $path,
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Hapus galeri
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar dari storage
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Hapus data dari database
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil dihapus!');
    }
}
