<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomCoupon extends Model
{
    protected $table = 'ecom_coupons';

    protected $fillable = [
        'tenant_id',
        'code',
        'slug',
        'discount_type',
        'discount_amount',
        'max_discount_amount',
        'minimum_order_amount',
        'max_use_per_user',
        'usage_limit',
        'times_used',
        'allowed_products',
        'allowed_categories',
        'allowed_users',
        'applies_to',
        'user_specific',
        'is_combinable',
        'auto_apply',
        'is_valid_all_time',
        'valid_from',
        'expiry_date',
        'description',
        'photo',
        'status'
    ];

    protected $casts = [
        'discount_amount' => 'integer',
        'max_discount_amount' => 'integer',
        'minimum_order_amount' => 'integer',
        'allowed_products' => 'array',
        'allowed_categories' => 'array',
        'allowed_users' => 'array',
        'valid_from' => 'date',
        'expiry_date' => 'date',
        'user_specific' => 'boolean',
        'is_combinable' => 'boolean',
        'auto_apply' => 'boolean',
        'is_valid_all_time' => 'boolean'
    ];
}
