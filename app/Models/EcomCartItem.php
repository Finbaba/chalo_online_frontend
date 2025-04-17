<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomCartItem extends Model
{
    // Define the table name if it differs from the default plural form
    protected $table = 'ecom_cart_items';

    // Define the fillable attributes
    protected $fillable = [
        'tenant_id',
        'cart_id',
        'customer_id',
        'product_id',
        'quantity',
        'is_variant',
        'variant_id',
    ];

    // Define relationships

    // Cart relationship (belongs to EcomCart)
    public function cart()
    {
        return $this->belongsTo(EcomCart::class);
    }

    // Customer relationship (belongs to Customer)
    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class);
    }

    // Product relationship (belongs to EcomProduct)
    public function product()
    {
        return $this->belongsTo(EcomProduct::class);
    }

    // Variant relationship (belongs to a variant model, e.g. EcomProductVariant)
    // public function variant()
    // {
    //     return $this->belongsTo(EcomProductVariant::class, 'variant_id');
    // }
}
