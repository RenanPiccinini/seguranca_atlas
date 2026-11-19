<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'badge',
        'icon',
        'short_description',
        'full_description',
        'image',
        'features',
        'benefits',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];
}
