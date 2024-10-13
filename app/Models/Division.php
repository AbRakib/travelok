<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model {
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
        'slug',
    ];

    /**
     * relation with division
     */
    public function districts(): HasMany {
        return $this->hasMany(District::class);
    }

    /**
     * relation with country
     */
    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }

    /**
     * relation with user
     */
    public function user() : HasOne {
        return $this->hasOne(User::class);
    }

    /**
     * relation with package
     */
    public function package() : HasOne {
        return $this->hasOne(Package::class);
    }

    /**
     * relation with destination
     */
    public function destination() : HasOne {
        return $this->hasOne(User::class);
    }
}