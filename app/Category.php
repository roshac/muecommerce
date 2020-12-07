<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table ='pcategories';

    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function category()
    {
        return $this->hasMany('App\Companies');
    }
    public function auction()
    {
        return $this->hasMany('App\Auction');
    }
}
