<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table='company';

    public function company()
    {
        return $this->belongsToMany('App\User');
    }

    public function user()
    {
        return $this->belongsTo('App\User')->with('roles');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function auction()
    {
        return $this->hasMany('App\Auction');
    }
}
