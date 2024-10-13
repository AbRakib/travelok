<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'details',
        'country_id',
        'division_id',
        'district_id',
        'start_date',
        'end_date',
        'available_seat',
        'total_cost',
        'image',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with country
     */
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * Relation with division
     */
    public function division() : BelongsTo {
        return $this->belongsTo(Division::class);
    }

    /**
     * Relation with district
     */
    public function district() : BelongsTo {
        return $this->belongsTo(District::class);
    }

    /**
     * Relation with multiple image
     */
    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }

    /**
     * Relation for Tour Package
     */
    public function tour_package() : HasOne {
        return $this->hasOne(TourRequest::class);
    }
}
