<?php

namespace Book;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'birthday', 'sex', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('Book\Role');
    }

    public function addresses()
    {
        return $this->hasMany('Book\Address');
    }

    public function comments()
    {
        return $this->hasMany('Book\Comment');
    }

    public function orders()
    {
        return $this->hasMany('Book\Order');
    }
}
