<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'total',
        'grand_total',
        'is_active'
    ];
}
