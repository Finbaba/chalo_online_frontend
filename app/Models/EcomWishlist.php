<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomWishlist extends Model
{


    protected $fillable = [
        'tenant_id',
        'customer_id',
        'product_id',
    ];

    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class, 'customer_id');
    }

    /**
     * Get the product associated with the wishlist item.
     */
    public function product()
    {
        return $this->belongsTo(EcomProduct::class, 'product_id');
    }
}
