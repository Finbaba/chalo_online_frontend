<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcomCategory extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'ecom_categories';

    // The attributes that are mass assignable.
    protected $fillable = [
        'tenant_id',
        'home_section_id',
        'name',
        'slug',
        'parent_id',
        'summary',
        'photo',
        'status',
        'demo_category_id',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [];

    // Cast attributes to specific types.
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationship to parent category (if the category has a parent)
    public function parentCategory()
    {
        return $this->belongsTo(EcomCategory::class, 'parent_id');
    }

    // Relationship to child categories (if the category has subcategories)
    public function subcategories()
    {
        return $this->hasMany(EcomCategory::class, 'parent_id');
    }
}
