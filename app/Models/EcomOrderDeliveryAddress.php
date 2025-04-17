<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomOrderDeliveryAddress extends Model
{
    // Define the table associated with the model
    protected $table = 'ecom_order_delivery_addresses';

    // Define the fillable attributes (columns that are mass-assignable)
    protected $fillable = [
        'tenant_id',
        'customer_id',
        'order_id',
        'fullname',
        'address_line1',
        'address_line2',
        'landmark',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'address_type',
        'latitude',
        'longitude',
        'address_location',
    ];

    // Define any relationships this model has
    public function order()
    {
        return $this->belongsTo(EcomOrder::class, 'order_id');
    }

    // Optionally, you can add other relationships like customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
