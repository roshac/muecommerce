<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction_user extends Model
{
    protected $table='auction_user';

    public function user()
    {
        return $this->belongsTo('App\User')->with('contact');
    }

    public function auction()
    {
        return $this->belongsTo('App\Auction')->with('user');
    }
}
