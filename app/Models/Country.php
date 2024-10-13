<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * relation with division
     */
    public function divisions(): HasMany {
        return $this->hasMany(Division::class);
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
