<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class DemoBrand extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'demo_brands';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'slug',
        'summary',
        'photo',
        'status',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [];

    // Cast attributes to specific types.
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Define relationships (if any)
    // For example, if you have a relation to products:
    public function products()
    {
        return $this->hasMany(DemoProduct::class);  // assuming there's a Product model
    }
    public function ecomBrands()
     {
         return $this->hasMany(EcomBrand::class, 'demo_brand_id');
     }
     public function isEcomBrandExists()
    {
        return $this->ecomBrands()->exists();
    }
}
