<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomOrder extends Model
{
    protected $fillable = [
        'tenant_id',
        'customer_id',
        'order_number',
        'sub_total',
        'discount_amount',
        'coupon_code',
        'coupon_discount_amount',
        'total_amount',
        'shipment_charge',
        'quantity',
        'is_tax',
        'tax_rate',
        'tax_amount',
        'total_without_tax',
        'total_paid_amount',
        'gst_number',
        'reward_used_amount',
        'payment_method',
        'payment_status',
        'status',
    ];
    protected $casts = [
        'sub_total' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'shipment_charge' => 'decimal:2',
        'quantity' => 'integer',
        'coupon_discount_amount' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_without_tax' => 'decimal:2',
        'total_paid_amount' => 'decimal:2',

    ];
    


    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }

    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class,'customer_id','id');
    }
    public function orderItems()
    {
        return $this->hasMany(EcomOrderItem::class, 'order_id','id');
    }

    // Define the relationship with delivery address
    public function deliveryAddress()
    {
        return $this->belongsTo(EcomOrderDeliveryAddress::class, 'id','order_id');
    }
    

}
