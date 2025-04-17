<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id', 
        'created_by', 
        'source', 
        'purpose', 
        'txn_date', 
        'txn_type', 
        'payment_mode', 
        'payment_status', 
        'amount', 
        'gst_amount', 
        'total_amount', 
        'is_gst', 
        'gst_percent', 
        'gst_slab', 
        'comment', 
        'image', 
    ];

    protected $casts = [
        'txn_date' => 'date',
        'amount' => 'decimal:2',
        'gst_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'is_gst' => 'boolean',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    // Method to calculate the available balance
    public static function calculateBalance($org_id)
    {
        $credits = self::where('org_id', $org_id)->where('txn_type', 'credit')->sum('total_amount');
        $debits = self::where('org_id', $org_id)->where('txn_type', 'debit')->sum('total_amount');

        $ret = (object)[
            "balance"=>$credits - $debits,
            "credit"=>$credits ,
            "debit"=> $debits
        ];

        return $ret;
    }

    public function getImageAttribute($value)
    {
        return url("transaction/".$value) ;
    }
}
