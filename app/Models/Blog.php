<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'tag',
        'details',
        'image',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
