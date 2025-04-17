<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;

class EcomCustomer extends Authenticatable
{
    use HasFactory, Notifiable ,HasApiTokens;
    // Table name (optional if it matches the plural form of the model name)
    protected $table = 'ecom_customers';

    // Primary key (optional if the default is 'id')
    protected $primaryKey = 'id';

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'tenant_id',
        'slug',
        'name',
        'email',
        'referral_code',
        'refer_by_id',
        'is_new',
        'avatar',
        'password',
        'phone',
        'remember_token',
        'device_type',
        'fcm_token',
    ];

    // Optionally hide the password field when the model is converted to an array or JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_new' => 'boolean',
        
    ];

    // Define the relationship with the tenant (assuming each customer belongs to a tenant)
    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }

    public static function generateReferralCode()
    {
        do {
            $code = strtoupper(Str::random(6)); // Generate an 8-character random code
        } while (self::where('referral_code', $code)->exists());

        return $code;
    }

}
