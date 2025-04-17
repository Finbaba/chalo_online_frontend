<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class EcomBrand extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'ecom_brands';

    // The attributes that are mass assignable.
    protected $fillable = [
        'tenant_id',
        'home_section_id',
        'name',
        'slug',
        'summary',
        'photo',
        'status',
        'demo_brand_id',
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
        return $this->hasMany(EcomProduct::class);  // assuming there's a Product model
    }
}
