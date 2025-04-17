<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class EcomHomeSection extends Model
{
    use HasFactory ;
    protected $table = 'ecom_home_sections';

    protected $fillable = [
        'tenant_id',
        'title',
        'type',
        'display',
        'order_number',
        'status',
    ];
}
