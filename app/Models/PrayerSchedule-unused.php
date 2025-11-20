<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'city', 'date', 'fajr', 'dhuhr', 'asr', 'maghrib', 'isha'
    ];
}
