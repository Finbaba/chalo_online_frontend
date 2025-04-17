<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DemoProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'demo_product_images'; // Explicitly defining the table name

    protected $fillable = [
        'product_id',
        'image_path',
        'thumbnail_image_path'
    ];

    /**
     * Define the relationship with the Product model.
     */
    public function product()
    {
        return $this->belongsTo(EcomProduct::class, 'product_id');
    }

    /**
     * Define the relationship with the Tenant model (if applicable).
     */
    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class, 'tenant_id');
    }
}
