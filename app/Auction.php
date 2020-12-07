<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'auction';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function company()
    {
        return $this->belongsTo('App\Companies');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function auction_user()
    {
        return $this->hasMany('App\Auction_user');
    }
    
}
