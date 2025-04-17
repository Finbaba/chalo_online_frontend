<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable ,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'phone',
        'user_type',
        'country_id',
        'starte_id', // likely intended to be `state_id`
        'city_id',
        'parent_id',
        'nds_id',
        'sds_id',
        'dsb_id',
        'rtl_id',
        'address',
        'company_name',
        'gstin',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships.
     */

    // Admin belongs to a country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Admin belongs to a state (assuming the typo `starte_id` is actually `state_id`)
    public function state()
    {
        return $this->belongsTo(State::class, 'starte_id');
    }

    // Admin belongs to a city
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Parent admin (if hierarchical system)
    public function parent()
    {
        return $this->belongsTo(Admin::class, 'parent_id');
    }

    // Admin belongs to an NDS (Node system)
    public function nds()
    {
        return $this->belongsTo(Admin::class, 'nds_id');
    }

    // Admin belongs to an SDS
    public function sds()
    {
        return $this->belongsTo(Admin::class, 'sds_id');
    }

    // Admin belongs to a DSB
    public function dsb()
    {
        return $this->belongsTo(Admin::class, 'dsb_id');
    }

    // Admin belongs to an RTL (Retailer)
    public function rtl()
    {
        return $this->belongsTo(Admin::class, 'rtl_id');
    }
}
