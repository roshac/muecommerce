<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Carts;
use App\Helpers\LogActivity;

class AddCart extends Controller
{
    
    public function addcart($pid,$seller,$photo,$category,$price,$desc,$name){

        $cart = new Carts;
        $cart->user_id = Auth::User()->id;
        $cart->products_id = $pid;
        $cart->seller_id=$seller;
        $cart->photo = $photo;
        $cart->category=$category;
        $cart->price=$price;
        $cart->description=$desc;
        $cart->name=$name;
        LogActivity::addToLog('Cart created');
        $cart->save();

        return redirect('/');

    }

    public function count(){
        $count = Carts::count()->where('status','1');
        return view('/', compact('count'));
    }
    
}
