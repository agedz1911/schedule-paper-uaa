<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchedulePaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code_abstract',
        'name_participant',
        'title',
        'date_presenter',
        'time_presenter',
        'is_active',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryPaper::class);
    }
}
