<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
    	'name', 'parent_id',
    ];

    public function products()
    {
    	return $this->hasMany('Book\Product');
    }

    public function parent()
    {
    	return $this->belongsTo('Book\Category', 'id');
    }

    public function child()
    {
    	return $this->hasMany('Book\Category', 'parent_id');
    }
}
