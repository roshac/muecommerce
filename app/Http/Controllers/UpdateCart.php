<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carts;

class UpdateCart extends Controller
{
    public function update($idd){
        $remove = Carts::find($idd);
        $remove->status = '2';
        $remove->save();

        return redirect('shopping_cart');
    }
}
