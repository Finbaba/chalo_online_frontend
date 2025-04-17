<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class EcomRewardPoint extends Model
{
    use HasFactory;

    protected $table = 'ecom_reward_points';

    protected $fillable = [
        'tenant_id',
        'customer_id',
        'order_id',
        'points',
        'transaction_type',
        'description',
        'expires_at',
    ];

    /**
     * Relationship: A reward point record belongs to a tenant.
     */
    public function tenant()
    {
        return $this->belongsTo(EcomTenant::class);
    }

    /**
     * Relationship: A reward point record belongs to a customer.
     */
    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class, 'customer_id'); // Assuming customers are stored in users table
    }

    /**
     * Relationship: A reward point record may belong to an order.
     */
    public function order()
    {
        return $this->belongsTo(EcomOrder::class);
    }
    public static function getTotalPoints($customer_id)
    {
        return self::where('customer_id', $customer_id)
            ->sum(DB::raw("CASE 
                                WHEN transaction_type = 'credit' THEN points 
                                WHEN transaction_type = 'debit' THEN -points 
                                ELSE 0 
                            END"));
    }
}
