<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'is_master',
        'org_id',
        'created_by',
        
    ];
}
