<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'quantity', 'price', 'subcategory_id',
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

    public function subcategory()
    {
        return $this->belongsTo('Book\Subcategory');
    }

    public function images()
    {
        return $this->hasMany('Book\Image');
    }

}
