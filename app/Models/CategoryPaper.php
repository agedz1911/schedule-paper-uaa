<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryPaper extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active',
        'sort'
    ];

    public function schedule(): HasMany
    {
        return $this->hasMany(SchedulePaper::class);
    }
}
