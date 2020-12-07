<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contact';

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function contact()
    {
        return $this->belongsTo('App\User');
    }

    public function bid_pay()
    {
        return $this->hasMany('App\BidPayment');
    }
    
}

