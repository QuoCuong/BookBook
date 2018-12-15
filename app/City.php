<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function addresses()
    {
        return $this->hasMany('Book\Address');
    }

    public function districts()
    {
        return $this->hasMany('Book\District');
    }
}
