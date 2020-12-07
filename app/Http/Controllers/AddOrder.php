<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Order_products;
use App\Helpers\LogActivity;
use App\Products;
use App\Odesc;
use App\Carts;
use App\Cart;
use Session;
use Flash;
use Stripe;

class AddOrder extends Controller
{
    public function addorder(Request $req){

        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $arrayy = $cart->items;
        $order = new Order;
        $order->user_id= Auth::user()->id;
        $order->contact_id = $req->area;

        // $cont = $req->area;
        // $type  = $req->area1;
        // return $cont;
        // if (!($cont == '1' && $type != 'COD')) {
            
            // return redirect()->back()->with('Error','This Servise does not surpot in Your Location'); 
        
        // Stripe\Stripe::setApiKey('sk_test_51GujqrBJVKJhJqjqCkApzRlICkhD9sbghdpkpp1ZJ1u5lZdNHLsu3EQzpoQnBJ9xIfqAkZDkLRTknrjss45L4XPE00ZwLS6dDd');
        //     $charge = Stripe\Charge::create ([
        //         "amount" => $cart->totalPrice,
        //         "currency" => "usd",
        //         "source" =>  $req->stripeToken,
        //         'description'=>'Product Payment',
        //         'transfer_group' => '{ORDER10}',
        // ]);
    
        $order->total_price = $cart->totalPrice;
              
        $order->save();
          
        $oederProduct = [];
        $array = $cart->items;
        foreach ($array as $produc) {
            $op = new Order_products();
            $op->order_id = $order->id;
            $op->products_id = $produc['item']['id'];
            $op->price = $produc['item']['price'];
            $op->user_id = $produc['item']['user_id'];
            $op->quantity = $produc['qty'];
            //$tok=$req->stripeToken;

        //     $charg = Stripe\Transfer::create([
        //         "amount" => $produc['item']['price'],
        //         "currency" => "usd",
        //         'destination' => $produc['item']['company']['stripe_accid'],
        //         'transfer_group' => '{ORDER10}',
                
                 
        // ]);
            $op->payement_id = $req->pay_phone;
           
            $op->save();

            $desc = new Odesc();
            $desc->order_products_id = $op->id;
            $desc->description = $req->desc;
            LogActivity::addToLog('Order created');
            $desc->save();

            
        }
         Session::forget('cart');
         Flash::success('Order submited successfully');

        return \redirect('my_order');

    }

    public function confirmOrder(){
        $order_line = Order_products::with(['products','status','user'])->where('status_id', '1')->get();
        // return $order_line;
        return view('confirmOrderLine',\compact('order_line'));
    }

    public function confirm($id){
        $remove = Order_products::find($id);
        $remove->status_id = '2';
        $remove->save();

        return redirect('confirm_order');
    }

    

}
  