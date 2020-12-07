<?php

use Illuminate\Support\Facades\Route;
use App\Products;
use App\Carts;
use PhpParser\Node\Stmt\If_;
use App\Events\OrderChange;
use App\Events\Bidchange;
use App\Contact;
use App\Order;
use App\Cart;
use Carbon\Carbon;
use App\Order_products;
use App\Status;
use App\User;
use App\Category;
use App\Companies;
uSe App\Auction;
use App\Auction_user;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

$products = Products::with(['user','category','company'])->orderBy('id','DESC')->get();
$count ='';
$skus = Auction_user::selectRaw('MAX(fee_paid) AS fee')
        ->whereColumn('auction_id', 'auction.id')
        ->getQuery();
        $auction = Auction::select('*')->with('user','company','category','auction_user')
        ->where('deadline' ,'>',Carbon::now())
        ->selectSub($skus, 'skus_count')
        ->get();

// return $product[0]->company;
    $product = [];

    foreach ($products as $prod) {
        # checking for zero status
        if ($prod->company->status){
        

            array_push($product, $prod);
        }
        
    }
    // return $product;
return view('welcome', compact('product','count','auction'));

});

Route::get('/fire', function () {

event(new Bidchange);

return 'Fired';

});



Route::get('itemdetail/{picha}', function($picha){
//$count = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get()->count();
//$info = $count->session()->get('info');
//print_r($info);
$productt = Products::with(['user','category'])->where('id',$picha)->first();
return view('itemdetail',compact('productt'));
});
Route::group(['middleware' => ['auth']], function () {
Route::get('shopping_cart',function(){
    
    $carts = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get();
    
    $price = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get()->sum('price');
    $count = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get()->count();
    return view('shopping_cart', compact('count','carts','price'));
});
});

Route::get('wish_list', function () {


return view('wish_list');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/welcome', 'GetProduct@getproduct')->name('welcome');



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['admin']], function () {
    Route::get('/user_list','UserList@list');
    Route::get('/giveadmin/{Id}', 'UserList@giveAdmin');
    Route::get('/removeadmin/{Id}','UserList@removeAdmin');
    Route::get('/give/{Ids}', 'UserList@giveSeller');
    Route::get('/giveap/{Ids}', 'UserList@giveSellerap');
    Route::get('/remove/{Ids}','UserList@removeSeller');
});
});

Route::resource('roles', 'RolesController');

Route::resource('pcategories', 'PcategoriesController');

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');
Auth::routes();
Route::view('addproduct', 'addproduct');
Route::post('submit', 'Addproduct@save');
Route::post('shipping2', 'AddOrder@addorder');

Route::post('addaddress', 'AddAddress@address');
Route::get('catego','categories@cate');

Route::get('yes','GetProduct@getproduct');


Route::get('myProduct','GetProduct@getproductUser');
Route::get('shopping_cart/{idd}','UpdateCart@update');

Route::group(['middleware' => ['auth']], function () {

Route::get('/cart/{pid}/{seller}/{photo}/{category}/{price}/{desc}/{name}','AddCart@addcart');
});

Route::get('addlog','HomeController@myTestAddToLog');

Route::get('lockscreen', function () {
return view('lockscreen');
});

// Route::get('customer', function () {
//     return view('user_dasboard');
// });

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', function () {
        if(Auth::user()->hasRole('Admin')){
            
            return redirect('home_admin');
        }elseif(Auth::user()->hasRole('Seller')){
            $order_dash = Order_products::where('user_id',Auth::user()->id)->with(['products','status'])->take(6)->get();
            return $prod;
            return view('user_dasboard',compact('order_dash'));
            
        }else {
           return view('home');
        }
    });
    
    Route::get('home_admin', function () {
        
    });
    
    Route::get('dashboard','TotalSales@getSales');
    Route::get('home_admin','TotalSales@getSalesAdmin');
    
});
/*Route::group(['middleware' => ['auth']], function () {
    Route::get('shipping', function () {
        $count = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get()->count();
        $address = Contact::where('user_id',Auth::User()->id)->get();
        $carts = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get();
        
        $price = Carts::where(['user_id'=>Auth::User()->id,'status'=>1],)->get()->sum('price');
        return view('shipping',compact('count','address','carts','price'));
        
    });
});
*/

Route::get('received', function () {
    
    
    $orders = Order::whereHas('order_products.products', function ($query) {
        $query->where('user_id', '=', auth()->user()->id);
    })->orderBy('id','DESC')->get();
    
    $order = Order::whereHas('order_products.products', function ($query) {
        $query->where('user_id', '=', auth()->user()->id);
    })->get()->count();
    
    
    //$orders = Order::with(['user','order_products','products','status'])->get();
    
    //$orders= auth()->user()->products;
    
    
    // $array = $orders[0]->cart;
    // $array1 = json_decode(json_encode($orders[0]->cart->products['item']), true);
    // return response()->json($array);
    return view('received_order',['orders' => $orders]);
});

Route::get('order_history/{orderid}', function($orderid){
    $detail  = Order::with(['user','contact','products','order_products'])->where('id',$orderid)->get();
    $order_produc = Order::with(['user','contact','products','order_products'])->get();
    $order_product = $order_produc[0]->with(['order_products','user','products'])->find($orderid);
    $status = Status::distinct()->get();

    


    // filter data
    
    // return $order_product;
    return view('order_history',compact('detail','order_product','status'));
});

Route::put('updatestatus/{ids}/{oda}', 'UpdateStatus@update');
Route::put('postcode/{ids}/{oda}', 'UpdateStatus@postcode');

Route::get('order_track/{id}', function ($id) {
    
    $order_track = Order_products::with(['products','status','user'])->where('order_id', $id)->get();
    //return   $order_track;
    return view('order_track',compact('order_track'));
    
});

Route::get('my_order', function(){
    $order = Order::where('user_id',Auth::User()->id)->with(['user','order_products','products'])->orderBy('id','DESC')->paginate(10);
   // return $order;
    return view('my_orders', compact('order'));
});
Route::get('/add_to_cart/{id}','Addproduct@getAddToCart');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/shipping','Addproduct@getCart');
    
    Route::get('/wishlist/{id}','WishList@getAddToWish');
    Route::get('/wish_list','WishList@getWish');
    
});
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Route::get('agreement', 'Company@agreement');
Route::get('agreement', 'Company@coStatus');
Route::get('agreement', 'Company@catego');
Route::post('agreement', 'Company@getAddToCompany')->name('agreement.post');
Route::get('test', function () {
     
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $arrayy = $cart->items;
    
    return $arrayy;
    return view('test');   
});

Route::get('user_profile', function () {

    return view('user_profile');   
});

Route::get('my_address', function () {
    $address = Contact::where('user_id',auth()->user()->id)->get();
    // return $address;
    return view('my_address',compact('address'));
    
});

Route::get('regi', function () {
    return view('registration');
    
});

Route::post('region','Registration@region');
Route::get('clothes', function(){
    $clothes=  Products::all();
    return view('clothes.clothes',compact('clothes'));
    
});
Route::get('eletronics', function(){
    $eletronics=  Products::all();
    return view('Eletronics.eletronics',compact('eletronics'));
    
});
Route::get('food', function(){
    $food=  Products::with('category')->get();
    
    return view('food.food',compact('food'));
    
    
});
Route::get('shoes', function(){
    $shoes=  Products::with('category')->get();
    
    return view('shoes.shoes',compact('shoes'));
    
    
});

Route::get('all', function(){
    $products=  Products::with('category')->get();

    $shoes = [];

    foreach ($products as $prod) {
        # checking for zero status
        if ($prod->company->status){
        

            array_push($shoes, $prod);
        }
        
    }
    
    return view('all',compact('shoes'));
    
    
});

Route::get('stat', function(){
    $stat=  Products::with('category')->get();
    
    return view('shoes.stationery',compact('stat'));
    
    
});
Route::get('beauty', function(){
    $beauty=  Products::with('category')->get();
    
    return view('shoes.beauty',compact('beauty'));
    
});

Route::get('gene','Order_details@generate');
Route::get('sticker/{orda}','Order_details@sticker');
Route::get('sticker_bid/{id}','Order_details@sticker_bid');
Route::put('profile/{id}','UserList@updatePic');
Route::get('user_profile','GetProduct@logs');
Route::get('adDay','Order_details@daily');
Route::get('adweek','Order_details@weekly');
Route::get('admonthly','Order_details@monthly');
Route::get('report','Order_details@admin');

Route::any('addAuction', function () {
    $categories = Category::distinct()->get(); 

    $compan = Companies::where('user_id',auth()->user()->id)->get();
    return view('addAuction', compact('categories','compan'));
    
});
Route::post('auction','AddAuction@add');
Route::get('my_auction','AddAuction@getAuction');

Route::group(['middleware' => ['auth']], function () {
Route::post('bid/{id}/{uid}','AddAuction@placeBid');

Route::get('aubid/{id}','AddAuction@bidFor');

Route::get('my_bid','AddAuction@bidMay');
Route::get('approve/{id}/{uid}','AddAuction@approve');
Route::get('approvedbid','AddAuction@approved');
Route::get('approvedbid_user','AddAuction@approved_user');
Route::post('bidPay/{id}/{fee}','AddAuction@bidpay');
Route::get('audelete/{id}','AddAuction@biddelete');
Route::get('won_bid','AddAuction@won');
Route::get('winner','AddAuction@winner');
Route::get('bid_detail/{id}','AddAuction@windetail');
Route::get('bid_track/{id}','AddAuction@bid_track');
Route::put('updatestatusbid/{id}','AddAuction@statusupdate');
Route::put('bidkposta','AddAuction@posta');
Route::get('change','ChangePassword@change');
Route::post('change','ChangePassword@store');
Route::get('predit/{id}','Addproduct@edit');
Route::put('updateprod/{id}','Addproduct@editprod');
Route::get('prdelete/{id}','Addproduct@delete');
Route::get('AuctionDelete/{id}','AddAuction@AuctionDelete');
Route::get('home','HomeController@users');
Route::post('feedback','UpdateStatus@feedback');
Route::put('feedbackbid','AddAuction@feedback');
Route::get('bid_feedback','AddAuction@feedbacku');
Route::get('feedback','Feed@feedback');
Route::put('coActivate/{id}','Company@coActivatee');
Route::post('daybtw','Order_details@btw');
Route::post('salesrepo','Order_details@salesrepo');
Route::get('sell_with', function () {
    $categories = Category::distinct()->get(); 
    return view('sell_with', compact('categories'));
    
});
});

Route::get('daybtwview', function(){
    return view('chooseDay');
});

Route::any('salesreport', function(){
    return view('sales');
});

Route::get('auctiondetail/{id}','AddAuction@detail');
Route::get('send','sms@smsSend');
Route::get('confirm_order', 'AddOrder@confirmOrder');
Route::put('confirmoda/{id}','AddOrder@confirm');