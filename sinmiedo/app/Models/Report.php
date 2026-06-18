<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Report extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_uuid',
        'category',
        'description',
        'location',
        'frequency',
        'victim_type',
        'aggressors',
        'emotion',
        'intensity',
        'status'
    ];

    protected $keyType = 'string';
    public $incrementing = false;
}
