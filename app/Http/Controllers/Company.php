<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Companies;
use Carbon\Carbon;
use App\Category;
use DateTime;
use Session;
use Stripe;
use App\Helpers\LogActivity;

class Company extends Controller
{
  
  /**
  * success response method.
  *
  * @return \Illuminate\Http\Response
  */
  public function agreement()
  {
    return view('agreement');
  }
  
  /**
  * success response method.
  *
  * @return \Illuminate\Http\Response
  */
  public function getAddToCompany(Request $request){
  $company = new Companies;
  
  $company->user_id= Auth::User()->id;
  $company->name = $request->name;
  $company->pcategories_id = $request->categories;
  $company->phone_no = $request->phone_no;
  $company->stripe_accid = $request->pay_id;
  $company->address = $request->address;
  $company->region_id = $request->region;
  $company->location = $request->location;

  if ($request->price == '5000') {
    $company->end_date = Carbon::now()->addDays(30);
  } elseif ($request->price == '60000') {
    $company->end_date = Carbon::now()->addDays(180);
  }else{
    $company->end_date = Carbon::now()->addDays(360);
  }
  
  $company->package_type = $request->price;
  
  
  Stripe\Stripe::setApiKey('sk_test_51GujqrBJVKJhJqjqCkApzRlICkhD9sbghdpkpp1ZJ1u5lZdNHLsu3EQzpoQnBJ9xIfqAkZDkLRTknrjss45L4XPE00ZwLS6dDd');
  $charge = Stripe\Charge::create ([
    "amount" => $request->price*100,
    "currency" => "tzs",
    "source" => $request->stripeToken,
    "description" => "Opnening Account Charge." 
    ]);
    $company->payemnt_id = $charge->id;

    LogActivity::addToLog('Company created');
    $company->save();
    Session::flash('success', 'Payment successful!');


    //send mail
    // $email = Auth::User()->email;
    // $sms = ['email'=>Auth::User()->email,'name'=>Auth::User()->name,];
    // Mail::send('regist',$sms,function($message) use($email){
    //   $message->to($email)->subject('Company or Brand Registration with Mu-Ecommerce');
    // });
    return back();
  }
  

  
  public function catego()
  {
    $categories = Category::distinct()->get(); 

    
    $cstatus = Companies::where('user_id',Auth::User()->id)->get();
    

    foreach ($cstatus as $value) {
      $time = $value->end_date ;
      $yes= Carbon::now()->toDateString();

      $fdate = $value->end_date ;
      $tdate = Carbon::now();
      $datetime1 = new DateTime($fdate);
      $datetime2 = new DateTime($tdate);
      $interval = $datetime1->diff($datetime2);
      $days = $interval->format('%a');//now do whatever you like with $days
      
      
    }
   
    // return $days;
    return view('agreement', compact('categories','cstatus','days'));
    
  }

  public function coStatus(){
    $cstatus = Companies::where('user_id',Auth::User()->id)->get();

    return view('agremeent',compact('cstatus'));
  }

  public function coActivatee($id){
    $company = Companies::findOrFail($id);

    // if ($request->price == '5000') {
      $company->end_date = Carbon::now()->addDays(30);
    // } elseif ($request->price == '60000') {
    //   $company->end_date = Carbon::now()->addDays(180);
    // }else{
    //   $company->end_date = Carbon::now()->addDays(360);
    // }
    // return $company;
    $company->package_type = '5000';
    $company->status ='1';
    $company->save();
    return \redirect('agreement');
    
  }
  
    
}
