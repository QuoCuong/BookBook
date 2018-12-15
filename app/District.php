<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'city_id',
    ];

    public function addresses()
    {
        return $this->hasMany('Book\Address');
    }

    public function city()
    {
        return $this->belongsTo('Book\City');
    }
}
