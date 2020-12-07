<?php

namespace App;
use App\User;
use App\Products;
use App\Order_products;
use App\Status;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    
    public function order_products()
    {
        return $this->hasMany('App\Order_products');
    }

    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
    public function status()
    {
        return $this->belongsTo('App\Order','App\Order_products');
    }
   
    
}
