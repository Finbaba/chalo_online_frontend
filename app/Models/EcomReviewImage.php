<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomReviewImage extends Model
{
    protected $table = 'ecom_review_images';
    protected $fillable = [
        'review_id',
        'product_id',
        'customer_id',
        'image_path',
        'thumbnail_image_path',
    ];

    public function review()
    {
        return $this->belongsTo(EcomReview::class, 'review_id');
    }

    public function product()
    {
        return $this->belongsTo(EcomProduct::class);
    }

    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class);
    }
}
