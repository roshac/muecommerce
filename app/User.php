<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;


class User extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected static $logAttributes = ['name', 'text'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role){
        $roles = $this->roles()->where('name',$role)->count();
        if($roles == 1){
            return true;
        }
        return false;
    }

    public function hasNRole($role){
        $roles = $this->roles()->where('name',$role)->count();
        if($roles == 1){
            return false;
        }
        return true;
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function products()
    {
        return $this->hasMany('App\Order_products');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function user()
    {
        return $this->hasMany('App\Order_products');
    }

    public function company()
    {
        return $this->hasMany('App\Companies');
    }
    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
    public function auction()
    {
        return $this->hasMany('App\Auction');
        
    }

    public function auction_user()
    {
        return $this->hasMany('App\Auction_user');
    }

    public function bid_pay()
    {
        return $this->hasMany('App\BidPayment');
    }
    
    
}
