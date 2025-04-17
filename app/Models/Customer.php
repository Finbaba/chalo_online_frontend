<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id',
        'created_by',
        'company_name',
        'contact_person',
        'contact_number',
        'contact_email',
        'is_gst',
        'gstin',
        'customer_type',
        'registration_type',
        'pan_number',
        'address_1',
        'address_2',
        'landmark',
        'city',
        'country',
        'state',
        'pincode',
        'fax',
        'website',
        'note'
    ];

}
