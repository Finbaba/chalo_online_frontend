<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomSlider extends Model
{
     // The table associated with the model.
     protected $table = 'ecom_sliders';

     // The attributes that are mass assignable.
     protected $fillable = [
         'title',
         'tenant_id',
         'description',
         'image',
         'type',
         'device',
         'redirect_url',
         'redirect_id',
         'status',
         'position',
         'home_section_id',
     ];
 
     // The attributes that should be hidden for arrays.
     protected $hidden = [];
 
     // Cast attributes to specific types.
     protected $casts = [
         'created_at' => 'datetime',
         'updated_at' => 'datetime',
         'deleted_at' => 'datetime',
     ];
 
}
