<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class DemoProduct extends Model
{
    use HasFactory, SoftDeletes;
     // The table associated with the model.
     protected $table = 'demo_products';

     // The attributes that are mass assignable.
     protected $fillable = [
         'title',
         'slug',
         'summary',
         'description',
         'photos',
         'modelno',
         'sku',
         'isbn_upc_barcode',
         'sale_price',
         'compare_price',
         'buy_price',
         'item_size',
         'available_stock',
         'subtrack_stock',
         'stock_status',
         'min_item_order',
         'maximum_item_order',
         'stock_avaliable_date',
         'is_variant',
         'variant',
         'specifications',
         'tags',
         'shipping_charge',
         'length',
         'breadth',
         'height',
         'weight',
         'status',
         'cat_id',
         'subcat_id',
         'brand_id',
     ];
 
     // The attributes that should be hidden for arrays.
     protected $hidden = [];
 
     // Cast attributes to specific types.
     protected $casts = [
         'photos' => 'array',
         'variant' => 'array',
         'specifications' => 'array',
         'sale_price' => 'decimal:2',
         'compare_price' => 'decimal:2',
         'buy_price' => 'decimal:2',
         'shipping_charge' => 'decimal:2',
         'created_at' => 'datetime',
         'updated_at' => 'datetime',
         'deleted_at' => 'datetime',
     ];
 
     // protected $attributes = [
     //     'sale_price' => 0,
     //     'compare_price'=> 0,
     //     'buy_price'=> 0
     // ];
 
     // Define relationships with category and brand
     public function category()
     {
         return $this->belongsTo(DemoCategory::class, 'cat_id');
     }
 
     public function brand()
     {
         return $this->belongsTo(DemoBrand::class, 'brand_id');
     }
     public function ecomProducts()
     {
         return $this->hasMany(EcomProduct::class, 'demo_product_id');
     }
     public function isEcomProductExists()
    {
        return $this->ecomProducts()->exists();
    }
    public function images()
     {
         return $this->hasMany(DemoProductImage::class, 'product_id');
     }
}
