<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'mood',
        'is_private',
        'password'
    ];

    protected $casts = [
        'is_private' => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];
}