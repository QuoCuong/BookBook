<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'total', 'date', 'user_id', 'address_id',
    ];

    public function user()
    {
        return $this->belongsTo('Book\User');
    }

    public function address()
    {
        return $this->belongsTo('Book\Address');
    }

    public function orderDetails()
    {
        return $this->hasMany('Book\OrderDetail');
    }
}
