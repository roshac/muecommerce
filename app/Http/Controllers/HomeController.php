<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Products;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('user','company');
        return view('home');
    }
    public function myTestAddToLog()
    {
       \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }

    public function users(){
        $user = User::with('company')->get()->take(3);
        $prod = Products::where('status',1)->orderBy('id','DESC')->get()->take(4);
        $produ = Products::orderBy('id','ASC')->get()->take(4);
        // return $user;
        return \view('home',compact('user','prod','produ'));
    }
}
