<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrayerTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrayerTimeAdminController extends Controller
{
    public function index()
    {
        $schedules = PrayerTime::latest()->paginate(7);
        return view('admin.prayers.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.prayers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city' => 'required|string|max:100',
            'date' => 'required|date',
            'fajr' => 'required|string',
            'dhuhr' => 'required|string',
            'asr' => 'required|string',
            'maghrib' => 'required|string',
            'isha' => 'required|string',
        ]);

        PrayerTime::create($validated);
        return redirect()->route('admin.prayers.index')->with('success', 'Jadwal salat berhasil ditambahkan!');
    }

    /**
     * 🔄 Refresh jadwal otomatis dari API dunia (Aladhan)
     */
    public function refresh(Request $request)
    {
        $city = $request->get('city', 'Cilegon'); // default ke Cilegon
        $response = Http::get("https://api.aladhan.com/v1/timingsByCity", [
            'city' => $city,
            'country' => 'Indonesia',
            'method' => 2
        ]);

        if ($response->successful()) {
           $data = $response->json()['data']['timings'];

            PrayerTime::updateOrCreate(
            ['date' => now()->toDateString()],
                [
                    'city'   => $city,
                    'imsak'  => $data['Imsak']  ?? '-',
                    'fajr'   => $data['Fajr']   ?? '-',
                    'dhuhr'  => $data['Dhuhr']  ?? '-',
                    'asr'    => $data['Asr']    ?? '-',
                    'maghrib'=> $data['Maghrib']?? '-',
                    'isha'   => $data['Isha']   ?? '-',
                ]
            );
            return back()->with('success', 'Jadwal sholat berhasil diperbarui otomatis!');
        }

        return back()->with('error', 'Gagal memuat jadwal otomatis.');
    }
}
