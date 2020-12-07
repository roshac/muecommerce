<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Regions;
use App\Helpers\LogActivity;
use Flash;

class Registration extends Controller
{
    public function region(Request $req){
        $region = new Regions;
        $region->name = $req->name;
        $region->ship_price = $req->price;

          $email = Auth::User()->email;
          $sms = ['email'=>Auth::User()->email,'name'=>Auth::User()->name];
          Mail::send('regist',$sms,function($message) use($email){
            $message->to($email)->subject('Company or Brand Registration with Mu-Ecommerce');
          });
        LogActivity::addToLog('Region created');
        $region->save();
        Flash::success('Region saved successfully');
        return \redirect('regi');
    }

    public function getRegion(){
        $reg = Regions::distinct()->get();
        return view('shipping',compact('reg'));
    }
}
