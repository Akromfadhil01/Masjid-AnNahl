<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'nomor_rekening',
        'nama_pemilik'
    ];
}