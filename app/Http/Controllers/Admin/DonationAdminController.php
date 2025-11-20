<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationAccount;
use Illuminate\Http\Request;

class DonationAdminController extends Controller
{
    /**
     * Display a listing of the donation accounts.
     */
    public function index()
    {
        $donations = DonationAccount::latest()->paginate(10);
        return view('admin.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new donation account.
     */
    public function create()
    {
        return view('admin.donations.create');
    }

    /**
     * Store a newly created donation account in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255'
        ]);

        DonationAccount::create($validated);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Rekening donasi berhasil ditambahkan!');
    }

    /**
     * Display the specified donation account.
     */
    public function show(DonationAccount $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified donation account.
     */
    public function edit(DonationAccount $donation)
    {
        return view('admin.donations.edit', compact('donation'));
    }

    /**
     * Update the specified donation account in storage.
     */
    public function update(Request $request, DonationAccount $donation)
    {
        $validated = $request->validate([
            'bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255'
        ]);

        $donation->update($validated);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Rekening donasi berhasil diupdate!');
    }

    /**
     * Remove the specified donation account from storage.
     */
    public function destroy(DonationAccount $donation)
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')
            ->with('success', 'Rekening donasi berhasil dihapus!');
    }
}