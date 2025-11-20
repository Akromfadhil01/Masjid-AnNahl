<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleAdminController extends Controller
{
    public function index()
    {
        $schedules = Schedule::latest()->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'imsak' => 'required|string',
            'subuh' => 'required|string',
            'dzuhur' => 'required|string',
            'ashar' => 'required|string',
            'maghrib' => 'required|string',
            'isya' => 'required|string',
        ]);

        Schedule::create($validated);
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil disimpan!');
    }
}
