<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\LogActivity;
use App\Contact;

class GetProduct extends Controller
{
    public function getproduct(){
        $product = Products::with(['user','category'])->where('status',1)->get();
        
         return view('myProduc', compact('product'));
     }

     public function getproductUser(){
        $product = Products::with(['user','category'])->where('user_id',Auth::user()->id)->where('status',1)->get();
        
         return view('myProduct', compact('product'));
     }

     public function cartt(){
         $cart = Products::with(['users']);
     }

     public function logs(){
        $logs=LogActivity::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get()->take(7);
        $address = Contact::where('user_id',auth()->user()->id)->get();
        // return $logs;
        return view('user_profile',compact('logs','address'));
    }


}
