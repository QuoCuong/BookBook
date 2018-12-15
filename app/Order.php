<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'total', 'date', 'address_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('Book\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('Book\OrderDetail');
    }
}
