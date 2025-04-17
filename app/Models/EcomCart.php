<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomCart extends Model
{
    // Define the table name (if it's different from the plural form of the model)
    protected $table = 'ecom_carts';

    // Define the fillable attributes (or guarded if you want to protect certain fields)
    protected $fillable = [
        'slug',
        'tenant_id',
        'customer_id',
        'coupon_id',
        'address_id',
    ];

    // Define relationships
    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }

    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class);
    }

    public function coupon()
    {
        return $this->belongsTo(EcomCoupon::class);
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(EcomCustomerAddress::class,'address_id','id');
    }
    public function cartItems()
    {
        return $this->hasMany(EcomCartItem::class, 'cart_id');
    }
    public function product()
    {
        return $this->belongsTo(EcomProduct::class, 'product_id');
    }

    // public function variant()
    // {
    //     return $this->belongsTo(EcomProductVariant::class, 'variant_id');
    // }
}
