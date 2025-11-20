<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'content', 'image', 
        'published_date', 'author', 'is_published'
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
    ];
}
