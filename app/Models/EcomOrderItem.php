<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomOrderItem extends Model
{
    protected $fillable = [
        'tenant_id',
        'order_id',
        'product_id',
        'quantity',
        'title',
        'description',
        'image',
        'sale_price',
        'compare_price',
        'discount_amount',
        'is_tax',
        'tax_rate',
        'tax_amount',
        'total_without_tax',
        'total',
        'weight',
        'length',
        'width',
        'height',
        'order_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'sale_price' => 'decimal:2',
        'compare_price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_without_tax' => 'decimal:2',
        'total_paid_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'weight' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
    ];

    /**
     * Relationships
     */

    // Relationship with the order
    public function order()
    {
        return $this->belongsTo(EcomOrder::class);
    }

    // Relationship with the product
    public function product()
    {
        return $this->belongsTo(EcomProduct::class);
    }
}
