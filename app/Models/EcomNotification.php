<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomNotification extends Model
{
    protected $fillable = [
        'tenant_id',
        'customer_id',
        'title',
        'body',
        'data',
        'type',
        'action_url',
        'is_read',
    ];

    /**
     * Cast attributes to specific types.
     */
    protected $casts = [
        'data' => 'array', // Automatically handle JSON data as an array
        'is_read' => 'boolean',
    ];

    /**
     * Get the user associated with the notification.
     */
    public function customer_id()
    {
        return $this->belongsTo(EcomCustomer::class);
    }
}
