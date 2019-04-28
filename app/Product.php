<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'code', 'name', 'description', 'quantity', 'price', 'category_id',
    ];

    public function productDetail()
    {
        return $this->hasOne('Book\ProductDetail');
    }

    public function orderDetails()
    {
        return $this->hasMany('Book\OrderDetail');
    }

    public function comments()
    {
        return $this->hasMany('Book\Comment');
    }

    public function category()
    {
        return $this->belongsTo('Book\Category');
    }

    public function images()
    {
        return $this->hasMany('Book\Image');
    }

    public function getOrderDetailsCountAttribute()
    {
        return $this->orderDetails->count();
    }

}
