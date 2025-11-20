<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'place',
        'type',
        'image',
        'published_date', 
        'author', 
        'is_published'
    ];
     protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
    ];
}