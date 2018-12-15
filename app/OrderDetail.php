<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
    	'quantity', 'order_id', 'product_id',
    ];

    public function product()
    {
    	return $this->belongsTo('Book\Product');
    }

    public function order()
    {
    	return $this->belongsTo('Book\Order');
    }
}
