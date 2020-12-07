<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    public function order_product()
    {
        return $this->belongsTo('App\Order_products')->with('user','products');
    }
}
