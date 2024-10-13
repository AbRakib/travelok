<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'father_name',
        'email',
        'password',
        'phone',
        'birth_date',
        'nid',
        'profession',
        'country_id',
        'division_id',
        'district_id',
        'marital_status',
        'visited_places',
        'image',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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

    /**
     * Relation with blog content
     */
    public function blogs(): HasMany {
        return $this->hasMany(Blog::class);
    }

    /**
     * Relation with package
     */
    public function packages(): HasMany {
        return $this->hasMany(Package::class);
    }

    /**
     * Relation with Tour Package
     */
    public function tour_requests(): HasMany {
        return $this->hasMany(TourRequest::class);
    }
}
