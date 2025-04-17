<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcomAppEnquiry extends Model
{
    use HasFactory;

    protected $table = 'ecom_app_enquiries';

    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'phone',
        'gst_number',
        'require_logo',
        'logo',
        'require_app',
        'require_payment_gateway',
        'require_support',
        'pro_feature',
        'paid_amount',
        'transaction_id',
        'comment',
        'payment_status',
        'order_status',
    ];

    protected $casts = [
        'require_logo' => 'boolean',
        'require_app' => 'boolean',
        'require_payment_gateway' => 'boolean',
        'require_support' => 'boolean',
        'pro_feature' => 'array',
        'paid_amount' => 'decimal:2',
    ];
}
