<?php

namespace Book;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'parent_id', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('Book\Category');
    }

    public function parent()
    {
        return $this->hasOne('Book\Subcategory', 'id');
    }

    public function child()
    {
        return $this->hasMany('Book\Subcategory', 'parent_id');
    }
}
