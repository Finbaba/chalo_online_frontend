<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    protected $table = 'ecom_brands'; // Ensure this matches your database table name

    // Optionally, define fillable fields if you plan to do mass assignment:
    //protected $fillable = ['name', 'slug', 'parent_id', 'image', 'created_at', 'updated_at'];
    protected $fillable = ['name'];
}
