<?php

namespace App;
use App\Products;
use App\Order;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    protected $table ='order_products';

    public function products()
    {
        return $this->belongsTo('App\Products');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User')->with('contact');
    }
    public function feedback()
    {
        return $this->hasMany('App\Feedback');
    }
    
}
