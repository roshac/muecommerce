<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_products;
use Illuminate\Support\Facades\Auth;
use App\Order;
use DB;
use App\Products;
use App\Charts\Sales;
use App\Companies;
use App\User;
use Carbon\Carbon;

class TotalSales extends Controller
{
    public function getSales(){
        $order_dash = Order_products::where('user_id',Auth::user()->id)->with(['products','status'])->take(6)->get();
        // $order = Order_products::where('user_id',Auth::user()->id)->pluck('price','created_at');
        $prod = Products::where('user_id',Auth::user()->id)->get()->count();

        $order =  DB::table('order_products')
        ->where('user_id',Auth::user()->id)
        ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(price) as price'))
        ->groupBy(DB::raw('DATE(created_at)'))->pluck('price','created_at');
        

        // $date = Carbon::now()->subDays(5)->startOfDay;
          

        $op = Order_products::where('user_id',Auth::user()->id)->get()->count();
        $sale = Order_products::where('user_id',Auth::user()->id)->get()->sum('price');
        $chart =  new Sales;

        $chart->labels($order->keys());
        $chart->dataset('Daily Sales','bar',$order->values())
        ->backgroundColor('#00bcd4');
        // return $billings;
        return view('user_dasboard',compact('chart','order_dash','prod','op','sale'));
    }

    public function getSalesAdmin(){
        $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
        ->whereColumn('user_id', 'users.id')
        ->getQuery();
        $order_product = User::select('*')->with('products','company')
        ->selectSub($skus, 'skus_count')
        ->orderBy('skus_count', 'DESC')
        ->take(5)
        ->get();

        $prod = Products::all()->count();
        $user = User::all()->count();
        $orda = Order::all()->count();
        $sale = Order::all()->sum('total_price');

        $date = Carbon::now()->startOfMonth();
        $order =  DB::table('order')
        ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'))
        ->where('created_at','>=',$date)
        ->groupBy(DB::raw('DATE(created_at)'))->pluck('price','created_at');
        $chart =  new Sales;

        $chart->labels($order->keys());
        $chart->dataset('Daily Sales','bar',$order->values())
        ->backgroundColor('#00bcd4');

        $seller = Companies::with('user')->get();
        $products = Products::with('user')->get()->take(5);
        // return $seller;
        // return $order_product;
        
        return view('home_admin',compact('order_product','prod','sale','orda','user','chart','seller','products'));
    }
}
