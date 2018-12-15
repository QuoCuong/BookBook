<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'phone', 'address', 'user_id', 'city_id', 'district_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('Book\City');
    }

    public function district()
    {
        return $this->belongsTo('Book\District');
    }
}
