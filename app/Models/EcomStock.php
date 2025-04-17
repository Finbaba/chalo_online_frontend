<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcomStock extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id', 'product_id', 'product_variant_id', 'qty', 'qty_type','buy_price'];

    public function product()
    {
        return $this->belongsTo(EcomProduct::class);
    }

    // public function variant()
    // {
    //     return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    // }

    public static function updateSalePrice($product_id)
    {
        $stockData = self::where('product_id', $product_id)
        ->where('qty_type', 'credit')
        ->selectRaw('SUM(buy_price * qty) as total_price, SUM(qty) as total_qty')
        ->first();

        // Calculate average buy price safely
        $averagePrice = ($stockData->total_qty > 0) ? ($stockData->total_price / $stockData->total_qty) : 0;

        // Update the product's buy price
        EcomProduct::where('id', $product_id)->update(['buy_price' => $averagePrice]);

        return $averagePrice;
    }
}
