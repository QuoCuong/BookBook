<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'rating_quality', 'rating_price', 'rating_value', 'nickname', 'title', 'content', 'product_id', 'user_id',
    ];

    public function averageRating()
    {
        return ($this->rating_quality + $this->rating_price + $this->rating_value) / 3;
    }

    public function user()
    {
        return $this->belongsTo('Book\User');
    }

    public function product()
    {
        return $this->belongsTo('Book\Product');
    }
}
