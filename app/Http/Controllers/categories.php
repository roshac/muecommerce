<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Companies;

class categories extends Controller
{
    //get category and company names
    function cate()
    {
        $categories = Category::distinct()->get(); 
        $compan = Companies::distinct()->get(); 
        return view('addproduct', compact('categories','compan'));
    
    }
    
}
