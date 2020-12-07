<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class Feed extends Controller
{
    public function feedback(){
        $feed = Feedback::with('order_product')->get();
        // return $feed;
        return \view('feedback',compact('feed'));
    }
}
