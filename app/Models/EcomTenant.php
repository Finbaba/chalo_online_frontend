<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomTenant extends Model
{
    // Table name (optional if it matches the plural form of the model name)
    protected $table = 'ecom_tenants';

    // Primary key (optional if the default is 'id')
    protected $primaryKey = 'id';

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'domain',
        'sub_domain',
        'prefix',
        'email',
        'phone',
        'logo',
        'pan_number',
        'gstin', 
        'is_gst',
        'address',
        'landmark', 
        'pincode', 
        'city', 
        'state',
        'website',
        'qr_code',
        'status'
    ];

    // Optional: Define any relationships (assuming a tenant belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
