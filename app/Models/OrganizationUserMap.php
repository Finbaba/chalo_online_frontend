<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationUserMap extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id',
        'created_by',
        'user_id',
        'is_admin',
        'is_active',
        'is_primary',
    ];

    /**
     * Get the organization associated with the map.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    /**
     * Get the user associated with the map.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
