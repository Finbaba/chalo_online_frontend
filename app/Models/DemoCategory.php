<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DemoCategory extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'demo_categories';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
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

    // Relationship to parent category (if the category has a parent)
    public function parentCategory()
    {
        return $this->belongsTo(DemoCategory::class, 'parent_id');
    }

    // Relationship to child categories (if the category has subcategories)
    public function subcategories()
    {
        return $this->hasMany(DemoCategory::class, 'parent_id');
    }
    public function ecomCategories()
     {
         return $this->hasMany(EcomCategory::class, 'demo_category_id');
     }
     public function isEcomCategoryExists()
    {
        return $this->ecomCategories()->exists();
    }
}
