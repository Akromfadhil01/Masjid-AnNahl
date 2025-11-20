<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\News;
use App\Models\Gallery;
use App\Models\DonationAccount;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Show admin dashboard with statistics
    public function index()
    {
        $stats = [
            'activities' => Activity::count(),
            'news' => News::count(),
            'galleries' => Gallery::count(),
            'donations' => DonationAccount::count(),
        ];

        $recentActivities = Activity::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentActivities', 'recentNews'));
    }
}