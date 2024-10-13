<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'phone',
        'email',
        'address',
        'logo',
        'icon',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'instagram',
        'developer',
    ];
}
