<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'sponsor',
        'quota',
        'status',
        'description',
        'flyer',
        'schedule',
        'is_active',
        'code',
        'no_urut',
        'url'
    ];

    protected $casts = [
        'schedule' => 'array'
    ];
}
