<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourRequest extends Model {
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_id',
    ];

    /**
     * Relation to user
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation to package
     */
    public function package() : BelongsTo {
        return $this->belongsTo(Package::class);
    }
}
