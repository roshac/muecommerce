<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\Pcategories;
use App\Companies;
use App\Category;
use App\Helpers\LogActivity;
use Session;
use Flash;
use App\Cart;
use App\Contact;
use App\Regions;
class Addproduct extends Controller
{
    
    
  public  function save(Request $req)
    {
       $imagepath = $req->file('photo')->store('public');
       $imagename = substr($imagepath,7);
        
        $product = new Products;
        $product->user_id= Auth::user()->id;
        $product->category_id= $req->categories;
        $product->company_id= $req->brand;   
        $product->photo =$imagename;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->description;
        LogActivity::addToLog('New product created');
        $product->save(); 
        Flash::success('Product saved successfully.');

        return \redirect('catego');
          
    }

   public function getAddToCart(Request $request,$id){
    $product = Products::find($id);
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->add($product, $product->id);
    $request->session()->put('cart', $cart);
    Session::flash('flash_message', 'Item added to your cart successfully.');
    return redirect()->back();

    }

    public function getCart(){
        $user = Auth()->user();
      if (!Session::has('cart',)) {
        return redirect('/');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      $reg = Regions::distinct()->get();
      $address = Contact::where('user_id',Auth::User()->id)->get();
      return view('shipping', ['product' => $cart->items, 'totalPrice' => $cart->totalPrice, 'user' => $user, 'total' => $total,'address' => $address,'regi'=>$reg]);
    }

    public function edit($id){
      $edit = Products::find($id);
      $categories = Category::distinct()->get(); 
      $compan = Companies::where('user_id',auth()->user()->id)->get();
      return \view('product_edit',compact('edit','categories','compan'));
      // return $edit;
    }

    public function editprod(Request  $req,$id){
      $product =  Products::find($id);
      $imagepath = $req->file('photo')->store('public');
      $imagename = substr($imagepath,7);
      $product->user_id= Auth::user()->id;
      $product->category_id= $req->categories;
      $product->company_id= $req->brand;   
      $product->photo =$imagename;
      $product->name = $req->name;
      $product->price = $req->price;
      $product->description = $req->description;
      LogActivity::addToLog('Product updated');
      $product->save(); 
      Flash::success('Product updated successfully.');
        return \redirect('myProduct');
    }
    
    public function delete($id){
      $delete =  Products::find($id);
      $delete->status = '2';
      $delete->save();
      return \redirect('myProduct');
    }
}
