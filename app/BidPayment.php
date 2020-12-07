<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidPayment extends Model
{
    protected $table = 'bid_payment';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
