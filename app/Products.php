<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Carts;
use App\Category;

class Products extends Model
{
    
  protected $table ='products';

  public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function company()
    {
        return $this->belongsTo('App\Companies');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\Carts');
    }

    public function products()
    {
        return $this->hasMany('App\Order_products');
    }
    
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    
        
}
