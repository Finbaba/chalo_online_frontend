<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EcomProduct extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'ecom_products';

    // The attributes that are mass assignable.
    protected $fillable = [
        'id',
        'tenant_id',
        'home_section_id',
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
        'avg_rating',
        'count_rating',
        'amazon_price',
        'flipkart_price',
        'status',
        'cat_id',
        'subcat_id',
        'brand_id',
        'demo_product_id'
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
        'avg_rating' => 'decimal:1',
        'count_rating' => 'integer',
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
        return $this->belongsTo(EcomCategory::class, 'cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(EcomBrand::class, 'brand_id');
    }
    public function reviews()
    {
        return $this->hasMany(EcomReview::class, 'id');
    }
}
