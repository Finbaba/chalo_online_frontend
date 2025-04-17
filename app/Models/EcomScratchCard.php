<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcomScratchCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'customer_id',
        'order_id',
        'reward_amount',
        'is_scratch',
        'scratch_at',
        'expires_at',
    ];

    protected $casts = [
        'is_scratch' => 'boolean',
        'scratch_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    // Relationship with Tenant
    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class);
    }
}
