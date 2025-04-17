<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'ecom_products';

    // Cast the 'photos' column to an array
    protected $casts = [
        'photos' => 'array',
    ];

    // Accessor to get the first image URL from the photos array
    public function getFirstPhotoAttribute()
    {
        if (is_array($this->photos) && count($this->photos) > 0 && isset($this->photos[0]['image'])) {
            return 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $this->photos[0]['image'];
        }
        return null;
    }
}
