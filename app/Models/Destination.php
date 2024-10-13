<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'country_id',
        'division_id',
        'district_id',
        'description',
        'image',
    ];

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
}
