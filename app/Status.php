<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table ='status';

    public function order_products()
    {
        return $this->hasMany('App\Order_products');
    }
    public function bid_pay()
    {
        return $this->hasMany('App\BidPayment');
    }
    public function status()
    {
        return $this->hasManyThrogh('App\Order','App\Order_products');
    }

}
