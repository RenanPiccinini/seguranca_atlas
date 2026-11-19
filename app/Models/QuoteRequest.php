<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'phone',
        'email',
        'service_type',
        'segment',
        'period',
        'city',
        'details',
        'urgency',
        'estimated_budget',
        'status',
        'ip_address',
    ];

    protected $casts = [
        'estimated_budget' => 'decimal:2',
    ];
}
