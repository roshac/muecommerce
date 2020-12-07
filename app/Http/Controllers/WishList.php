<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Wishlists;
use Session;

class WishList extends Controller
{
    
   public function getAddToWish(Request $request,$id){
    $product = Products::find($id);
    $oldWish = Session::has('wish') ? Session::get('wish') : null;
    $wish = new Wishlists($oldWish);
    $wish->add($product, $product->id);
    $request->session()->put('wish', $wish);
    Session::flash('flash_message', 'Item added to your wish successfully.');
    return redirect()->back();

    }

    public function getWish(){
        $user = Auth()->user();
      if (!Session::has('wish',)) {
        return redirect()->back();
      }
      $oldWish = Session::get('wish');
      $wish = new Wishlists($oldWish);
      return view('/wish_list', ['product' => $wish->items,]);
    }

}
