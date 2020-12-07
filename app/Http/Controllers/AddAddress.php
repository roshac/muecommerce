<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use Flash;

class AddAddress extends Controller
{
    public function address(Request $req){
        $contact = new Contact;
        $contact->user_id= Auth::user()->id;
        $contact->region_id= $req->regi;
        $contact->location = $req->area;
        $contact->phone_no = $req->phone;
        $contact->save();
        Flash::success('Address successfully saved');

        return \redirect('shipping');

    }
}
