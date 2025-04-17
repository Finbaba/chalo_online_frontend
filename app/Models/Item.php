<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id',
        'created_by',
        'category_id',
        'item_name',
        'item_type',
        'description',
        'barcode',
        'hsn_sac',
        'sale_price',
        'is_tax',
        'discount',
        'discount_type',
        'tax',
        'cess',
        'cess_type',
        'unit',
    ];
}
