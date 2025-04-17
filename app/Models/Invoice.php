<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by', 'org_id', 'inv_prefix', 'inv_num', 'create_date', 
        'due_date', 'billing_address', 'shipping_address', 'items',
        'total_discount', 'total_amount', 'receive_amount', 'due_amount',
        'note', 'payment_mode', 'payment_ref_num', 'attachment', 'gst', 
        'cess', 'cess_type'
    ];

    protected $casts = [
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'items' => 'array',
        'create_date' => 'date',
        'due_date' => 'date'
    ];
}
