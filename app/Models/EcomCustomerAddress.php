<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomCustomerAddress extends Model
{
    // Specify the table name if it doesn't follow the default convention
    protected $table = 'ecom_customer_addresses';

    // The attributes that are mass assignable
    protected $fillable = [
        'tenant_id',
        'customer_id',
        'fullname',
        'address_line1',
        'address_line2',
        'landmark',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'is_primary',
        'address_type',
        'latitude',
        'longitude',
        'address_location',
  
    ];

    // Define relationships if necessary
    // Assuming there is a Customer model and Tenant model
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }
}
