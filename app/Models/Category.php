<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'cate_type',
        'is_master',
        'org_id',
        'created_by',
        'parent_id',
        'amount'
        
    ];
}
