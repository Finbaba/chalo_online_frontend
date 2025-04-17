<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcomReview extends Model
{
    protected $table = 'ecom_reviews';
    protected $fillable = [
        'product_id',
        'customer_id',
        'author',
        'review',
        'rating',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(EcomProduct::class);
    }

    public function customer()
    {
        return $this->belongsTo(EcomCustomer::class);
    }
    public function images()
    {
        return $this->hasMany(EcomReviewImage::class, 'review_id');
    }
    public static function getPaginatedReviews($perPage = 10)
    {
        return self::with(['images'])->paginate($perPage);
    }
}
