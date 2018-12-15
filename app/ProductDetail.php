<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'author', 'publisher', 'publish_year', 'weight', 'size', 'number_of_page', 'cover', 'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('Book\Product');
    }
}
