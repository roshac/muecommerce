<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use URL;
use App\Companies;
use App\Order_products;
use DB;
use Carbon\Carbon;
use App\BidPayment;
use App\User;
use App\Order;

class Order_details extends Controller
{
    public function generate(){
        $cstatus = Companies::where('user_id',Auth::User()->id)->get();
        foreach ($cstatus as $key => $value) {
            $ff= $value->name;
            $location =$value->location;
            $phone = $value->phone_no;
            $p = $value->package_type;
            $ex = $value->end_date;
            $add= $value->address;
            $reg = $value->region_id;
            $phone = $value->phone_no;
           
        }
        $order =  DB::table('order_products')
        ->where('user_id',Auth::user()->id)

        ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(price) as price'), DB::raw('count(user_id) as orde'))
        ->groupBy(DB::raw('DATE(created_at)'))->get();
        
        $total = Order_products::where('user_id',Auth::User()->id)->get()->sum('price');
        $totaloda = Order_products::where('user_id',Auth::User()->id)->get()->count('user_id');
         //return $order;
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_top' => 35,
            'margin_bottom' => 17,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);
       

       $html='<style>
        @page {
        size: auto;
        sheet-size: A4;
        header: myHTMLHeader1;
        footer: myHTMLFooter1;
        }
        </style>
        <htmlpageheader name="myHTMLHeader1">
        <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
        <td width="8%"><img src="storage/t.jpg" height="60"/></td>
        <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
        <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
        </tr></table>
        <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
        <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
        </tr>
        </table>
        </htmlpageheader>
        <htmlpagefooter name="myHTMLFooter1">
        <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
        <tr>
        <th align="left">&copy; MU-Ecommerce</th>
        <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
        </tr>
        </table>
        </htmlpagefooter>
        <h3>Hello! '.Auth::user()->name.'</h3>
        <h3>Address</h3>
        <h4>'.$add.'</h4>
        <h4>'.$reg.'</h4>
        <p>'.$location.'</p>
        <p>'.$phone.'</p>
        <h4>Your Summary Report is as Follow</h4>
        <h3 align="center">Company Information</h3>
        <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%">
        <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>
        
        <tr><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td><td>'.$p.'</td><td>'.$ex.'</td></tr>
        </table>
        <h3 style="text-align: center">Today Sales Analysis  Table</h3>
        <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
        <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
        foreach ($order as $key1 => $o) {
            $date = $o->created_at;
            $oda = $o->orde;
            $sale = $o->price;

            $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
        }
       $html.='
       <tr><td>&nbsp;</td></tr>
       
       <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
        $html.='</table>
        <table>
        <tr><th>Regards</th></tr>
        <tr><td>Mu-Ecommerce</td></tr>
        </table>


        ';
    
        
    
    
        
         $output = new Output\Png();

        $mpdf->WriteHTML($html);
        $mpdf->SetTitle('MU-Ecommerce Saller Report');
        $mpdf->SetWatermarkImage('storage/t.jpg');
        $mpdf->showWatermarkImage = true;

        return $mpdf->Output("test.pdf", "I");

    }

    public function sticker($orda){

        //$detail  = Order::with(['user','contact','products','order_products'])->where('id',$orda)->get();
        $order_produc = Order::with(['user','contact','products','order_products'])->get();
        $order_product = $order_produc[0]->with(['order_products','user','contact','products'])->find($orda);
        // return $order_product;
             $use = $order_product->user->name;
             $cont = $order_product->contact->location;
             $ph = $order_product->contact->phone_no;
        foreach ($order_product->order_products as $v) {
            //return $v->user;
            ;
            if ($v->user_id == Auth::User()->id) {
                
                $id = $v->order_id;
                
                foreach ($v->user->contact as $key => $phone) {
                    $p=$phone->phone_no;
                    // return $p;
                }
                $prod = $v->products->name;
                $pri = $v->products->price;
            }
            

        }
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_top' => 6,
            'margin_bottom' => 10,
            'margin_header' => 4,
            'margin_left' => 7,
            'margin_right' => 7,
            'margin_footer' => 10,
        ]);

        $html='<style>
        @page {
        size: auto;
        sheet-size: A6;
        header: myHTMLHeader1;
        footer: myHTMLFooter1;
        }
        </style>
        
        <htmlpageheader name="myHTMLHeader1">
        <table width="120%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 47pt; color: #000088;"><tr>
        <td width="10%"><img src="storage/t.jpg" height="90"/></td>
        <td width="40%" color="brown"><b>Mu-Ecommerce</b></td>
        </tr></table>
        <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
        <tr><th align="right"><small>Dated : '.date("d-m-Y H:i:s").'</small></th>
        </tr>
        </table>
        </htmlpageheader>
        <htmlpagefooter name="myHTMLFooter1">
        <table width="100%" style="border-top: 2px solid #000000;font-size:10px;">
        <tr>
        <th align="left">&copy; MU-Ecommerce</th>
        <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO}</td>
        </tr>
        </table>
        </htmlpagefooter>
        <table width="100%" style="font-family: roboto; font-size: 12pt;">
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Delivered To: </td> <td>'.$use.'</td></tr>
        <tr><td>Location:</td> <td>'.$cont.'</td></tr>
        <tr><td>Phone No: </td> <td>'.$ph.'</td></tr>
        
        <tr><td>Saller</td><td>'.Auth::user()->name.'</td></tr>
        <tr><td>Saller Phone No</td><td>'.$p.'</td></tr>

      
        </table>
        <p align="center"> <barcode code="Order ID '.$id.' product Name '.$prod.' price '.$pri.'" size="2.4" type="QR" error="M" class="barcode" /> </p>
        
      
        ';



        $output = new Output\Png();

        $mpdf->WriteHTML($html);
        $mpdf->SetTitle('MU-Ecommerce Saller Report');
        $mpdf->SetWatermarkImage('storage/t.jpg');
        $mpdf->showWatermarkImage = true;

        return $mpdf->Output("stiker.pdf", "I");

    }


    public function sticker_bid($id){
        $bid = BidPayment::with('user','contact')->findOrFail($id);
        // return $bid;
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_top' => 6,
            'margin_bottom' => 10,
            'margin_header' => 4,
            'margin_left' => 7,
            'margin_right' => 7,
            'margin_footer' => 10,
        ]);

        $html='<style>
        @page {
        size: auto;
        sheet-size: A6;
        header: myHTMLHeader1;
        footer: myHTMLFooter1;
        }
        </style>
        
        <htmlpageheader name="myHTMLHeader1">
        <table width="120%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 47pt; color: #000088;"><tr>
        <td width="10%"><img src="storage/t.jpg" height="90"/></td>
        <td width="40%" color="brown"><b>Mu-Ecommerce</b></td>
        </tr></table>
        <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
        <tr><th align="right"><small>Dated : '.date("d-m-Y H:i:s").'</small></th>
        </tr>
        </table>
        </htmlpageheader>
        <htmlpagefooter name="myHTMLFooter1">
        <table width="100%" style="border-top: 2px solid #000000;font-size:10px;">
        <tr>
        <th align="left">&copy; MU-Ecommerce</th>
        <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO}</td>
        </tr>
        </table>
        </htmlpagefooter>
        <table width="100%" style="font-family: roboto; font-size: 12pt;">
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Delivered To: </td> <td>'.$bid->user->name.'</td></tr>
        <tr><td>Location:</td> <td>'.$bid->contact->location.'</td></tr>
        <tr><td>Phone No: </td> <td>'.$bid->contact->phone_no.'</td></tr>
        <tr><td>Saller</td><td>'.Auth::user()->name.'</td></tr>
        <tr><td>Saller Phone No</td><td>'.$bid->contact->phone_no.'</td></tr>
        </table>
        <p align="center"> <barcode code="Order ID '.$bid->id.' product Name '.$bid->auction_name.' price '.$bid->fee_paid.'" size="2.4" type="QR" error="M" class="barcode" /> </p>  
        ';



        $output = new Output\Png();

        $mpdf->WriteHTML($html);
        $mpdf->SetTitle('MU-Ecommerce Saller Report');
        $mpdf->SetWatermarkImage('storage/t.jpg');
        $mpdf->showWatermarkImage = true;

        return $mpdf->Output("stiker.pdf", "I");


    }
    //Admin Report
    public function admin(){

        $cstatus = Companies::all();
        
        $order =  DB::table('order')
        ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'), DB::raw('count(user_id) as orde'))
        ->groupBy(DB::raw('DATE(created_at)'))->get();
        $total = Order::all()->sum('total_price');
        $totaloda = Order_products::where('user_id',Auth::User()->id)->get()->count('user_id');

        //top salers
        $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
        ->whereColumn('user_id', 'users.id')
        ->getQuery();
        $sal = User::select('*')->with('products','company')
        ->selectSub($skus, 'skus_count')
        ->orderBy('skus_count', 'DESC')
        ->take(5)
        ->get();
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_top' => 35,
            'margin_bottom' => 17,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);
        $html='<style>
        @page {
        size: auto;
        sheet-size: A4;
        header: myHTMLHeader1;
        footer: myHTMLFooter1;
        }
        </style>

        <htmlpageheader name="myHTMLHeader1">
        <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
        <td width="8%"><img src="storage/t.jpg" height="60"/></td>
        <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
        <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
        </tr></table>
        <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
        <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
        </tr>
        </table>
        </htmlpageheader>
        <htmlpagefooter name="myHTMLFooter1">
        <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
        <tr>
        <th align="left">&copy; MU-Ecommerce</th>
        <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
        </tr>
        </table>
        </htmlpagefooter>
        <h3>Hello! '.Auth::user()->name.'</h3>

        <p style="font-size: 18px;">The following is th report of the whole system it takes updated data of the current time including User registered Company registered Total orders and Total sales from all Salers</p>

        <h3 align="center">Company Registered</h3>
        <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%;font-size: 12pt;">
        <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>';
        foreach ($cstatus as $key => $value) {
            $ff= $value->name;
            $location =$value->location;
            $phone = $value->phone_no;
            $p = $value->package_type;
            $ex = $value->end_date;
            $add= $value->address;
            $reg = $value->region_id;
            $phone = $value->phone_no;
        
       $html.='<tr align="center"><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td> <td>'.$p.'</td> <td>'.$ex.'</td></tr>';
         }
       $html.='</table>

       <h3 style="text-align: center">Analysis Sales Table</h3>
       <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
       <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
       foreach ($order as $key1 => $o) {
           $date = $o->created_at;
           $oda = $o->orde;
           $sale = $o->price;

           $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
       }
      $html.='
      <tr><td>&nbsp;</td></tr>
      <tr><td colspan="4"><hr></td></tr>
      <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
       $html.='</table>

       <h3 style="text-align: center">Top Salers</h3>
       <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center;font-size: 12pt;">
       <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Company</th><th>Status</th><th>Total Sales</th></tr>';
       foreach ($sal as $key2 => $s) {
        foreach ($s->company as $company){
            
     
        $user = $s->name;
        $photo = $s->photo;
        $com = $company->name;
        $stat = $company->status;
        $cou = $s->skus_count;
            if ($stat == '0') {
                $stat = 'Inactive';
            }else {
                $stat = 'Active';
            }
     
        $html.='<tr><td>'.++$key2.'</td> <td>'.$user.'</td><td><img src="storage/'.$photo.'" height="40"/></td><td>'.$com.'</td> <td>'.$stat.'</td><td>'.$cou.'</td></tr>';
    
 }
}
      $html.='
      <tr><td>&nbsp;</td></tr>';
      
       $html.='</table>
        ';




        $output = new Output\Png();

        $mpdf->WriteHTML($html);
        $mpdf->SetTitle('MU-Ecommerce Saller Report');
        $mpdf->SetWatermarkImage('storage/t.jpg');
        $mpdf->showWatermarkImage = true;

        return $mpdf->Output("admin.pdf", "I");    

    }

    public function daily(){
            $cstatus = Companies::all();
            $date = Carbon::now()->startOfDay();
            $order =  DB::table('order')
            ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'), DB::raw('count(user_id) as orde'))
            ->where('created_at','>=',$date)
            ->groupBy(DB::raw('DATE(created_at)'))->get();
            $total = Order::where('created_at','>=',$date)->get()->sum('total_price');
            $totaloda = Order_products::where('created_at','>=',$date)->where('user_id',Auth::User()->id)->get()->count('user_id');
    
            //top salers
            $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
            ->where('created_at','>=',$date)
            ->whereColumn('user_id', 'users.id')
            ->getQuery();
            $sal = User::select('*')->with('products','company')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')
            ->take(5)
            ->get();
            
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'c',
                'margin_top' => 35,
                'margin_bottom' => 17,
                'margin_header' => 10,
                'margin_footer' => 10,
            ]);
            $html='<style>
            @page {
            size: auto;
            sheet-size: A4;
            header: myHTMLHeader1;
            footer: myHTMLFooter1;
            }
            </style>
    
            <htmlpageheader name="myHTMLHeader1">
            <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
            <td width="8%"><img src="storage/t.jpg" height="60"/></td>
            <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
            <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
            </tr></table>
            <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
            <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
            </tr>
            </table>
            </htmlpageheader>
            <htmlpagefooter name="myHTMLFooter1">
            <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
            <tr>
            <th align="left">&copy; MU-Ecommerce</th>
            <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
            </tr>
            </table>
            </htmlpagefooter>
            <h3>Hello! '.Auth::user()->name.'</h3>
    
            <p style="font-size: 18px;">The following is th report of the whole system it takes updated data of the current time including User registered Company registered Total orders and Total sales from all Salers</p>
    
            <h3 align="center">Company Registered</h3>
            <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%;font-size: 12pt;">
            <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>';
            foreach ($cstatus as $key => $value) {
                $ff= $value->name;
                $location =$value->location;
                $phone = $value->phone_no;
                $p = $value->package_type;
                $ex = $value->end_date;
                $add= $value->address;
                $reg = $value->region_id;
                $phone = $value->phone_no;
            
           $html.='<tr align="center"><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td> <td>'.$p.'</td> <td>'.$ex.'</td></tr>';
             }
           $html.='</table>
    
           <h3 style="text-align: center">Analysis Sales Table</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
           <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
           foreach ($order as $key1 => $o) {
               $date = $o->created_at;
               $oda = $o->orde;
               $sale = $o->price;
    
               $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
           }
          $html.='
          <tr><td>&nbsp;</td></tr>
          <tr><td colspan="4"><hr></td></tr>
          <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
           $html.='</table>
    
           <h3 style="text-align: center">Today Top Salers</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center;font-size: 12pt;">
           <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Company</th><th>Status</th><th>Total Sales</th></tr>';
           foreach ($sal as $key2 => $s) {
            foreach ($s->company as $company){
                
         
            $user = $s->name;
            $photo = $s->photo;
            $com = $company->name;
            $stat = $company->status;
            $cou = $s->skus_count;
                if ($stat == '0') {
                    $stat = 'Inactive';
                }else {
                    $stat = 'Active';
                }
         
            $html.='<tr><td>'.++$key2.'</td> <td>'.$user.'</td><td><img src="storage/'.$photo.'" height="40"/></td><td>'.$com.'</td> <td>'.$stat.'</td><td>'.$cou.'</td></tr>';
        
     }
    }
          $html.='
          <tr><td>&nbsp;</td></tr>';
          
           $html.='</table>
            ';
    
    
    
    
            $output = new Output\Png();
    
            $mpdf->WriteHTML($html);
            $mpdf->SetTitle('MU-Ecommerce Saller Report');
            $mpdf->SetWatermarkImage('storage/t.jpg');
            $mpdf->showWatermarkImage = true;
    
            return $mpdf->Output("admin.pdf", "I");    
    
        }

        public function weekly(){
            $cstatus = Companies::all();
            $date = Carbon::now()->startOfWeek();
            $order =  DB::table('order')
            ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'), DB::raw('count(user_id) as orde'))
            ->where('created_at','>=',$date)
            ->groupBy(DB::raw('DATE(created_at)'))->get();
            $total = Order::where('created_at','>=',$date)->get()->sum('total_price');
            $totaloda = Order_products::where('created_at','>=',$date)->where('user_id',Auth::User()->id)->get()->count('user_id');
    
            //top salers
            $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
            ->where('created_at','>=',$date)
            ->whereColumn('user_id', 'users.id')
            ->getQuery();
            $sal = User::select('*')->with('products','company')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')
            ->take(5)
            ->get();
            
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'c',
                'margin_top' => 35,
                'margin_bottom' => 17,
                'margin_header' => 10,
                'margin_footer' => 10,
            ]);
            $html='<style>
            @page {
            size: auto;
            sheet-size: A4;
            header: myHTMLHeader1;
            footer: myHTMLFooter1;
            }
            </style>
            <htmlpageheader name="myHTMLHeader1">
            <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
            <td width="8%"><img src="storage/t.jpg" height="60"/></td>
            <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
            <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
            </tr></table>
            <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
            <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
            </tr>
            </table>
            </htmlpageheader>
            <htmlpagefooter name="myHTMLFooter1">
            <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
            <tr>
            <th align="left">&copy; MU-Ecommerce</th>
            <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
            </tr>
            </table>
            </htmlpagefooter>
            <h3>Hello! '.Auth::user()->name.'</h3>
    
            <p style="font-size: 18px;">The following is th report of the whole system it takes updated data of the current time including User registered Company registered Total orders and Total sales from all Salers</p>
    
            <h3 align="center">Company Registered</h3>
            <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%;font-size: 12pt;">
            <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>';
            foreach ($cstatus as $key => $value) {
                $ff= $value->name;
                $location =$value->location;
                $phone = $value->phone_no;
                $p = $value->package_type;
                $ex = $value->end_date;
                $add= $value->address;
                $reg = $value->region_id;
                $phone = $value->phone_no;
            
           $html.='<tr align="center"><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td> <td>'.$p.'</td> <td>'.$ex.'</td></tr>';
             }
           $html.='</table>
    
           <h3 style="text-align: center">Analysis Sales Table</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
           <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
           foreach ($order as $key1 => $o) {
               $date = $o->created_at;
               $oda = $o->orde;
               $sale = $o->price;
    
               $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
           }
          $html.='
          <tr><td>&nbsp;</td></tr>
          <tr><td colspan="4"><hr></td></tr>
          <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
           $html.='</table>
    
           <h3 style="text-align: center">Today Top Salers</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center;font-size: 12pt;">
           <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Company</th><th>Status</th><th>Total Sales</th></tr>';
           foreach ($sal as $key2 => $s) {
            foreach ($s->company as $company){
                
         
            $user = $s->name;
            $photo = $s->photo;
            $com = $company->name;
            $stat = $company->status;
            $cou = $s->skus_count;
                if ($stat == '0') {
                    $stat = 'Inactive';
                }else {
                    $stat = 'Active';
                }
         
            $html.='<tr><td>'.++$key2.'</td> <td>'.$user.'</td><td><img src="storage/'.$photo.'" height="40"/></td><td>'.$com.'</td> <td>'.$stat.'</td><td>'.$cou.'</td></tr>';
        
     }
    }
          $html.='
          <tr><td>&nbsp;</td></tr>';
          
           $html.='</table>
            ';
    
            $output = new Output\Png();
    
            $mpdf->WriteHTML($html);
            $mpdf->SetTitle('MU-Ecommerce Saller Report');
            $mpdf->SetWatermarkImage('storage/t.jpg');
            $mpdf->showWatermarkImage = true;
    
            return $mpdf->Output("admin.pdf", "I");    
    
        }

        public function monthly(){
            $cstatus = Companies::all();
            $date = Carbon::now()->startOfMonth();
            $order =  DB::table('order')
            ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'), DB::raw('count(user_id) as orde'))
            ->where('created_at','>=',$date)
            ->groupBy(DB::raw('DATE(created_at)'))->get();
            $total = Order::where('created_at','>=',$date)->get()->sum('total_price');
            $totaloda = Order_products::where('created_at','>=',$date)->where('user_id',Auth::User()->id)->get()->count('user_id');
    
            //top salers
            $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
            ->where('created_at','>=',$date)
            ->whereColumn('user_id', 'users.id')
            ->getQuery();
            $sal = User::select('*')->with('products','company')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')
            ->take(5)
            ->get();
            
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'c',
                'margin_top' => 35,
                'margin_bottom' => 17,
                'margin_header' => 10,
                'margin_footer' => 10,
            ]);
            $html='<style>
            @page {
            size: auto;
            sheet-size: A4;
            header: myHTMLHeader1;
            footer: myHTMLFooter1;
            }
            </style>
    
            <htmlpageheader name="myHTMLHeader1">
            <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
            <td width="8%"><img src="storage/t.jpg" height="60"/></td>
            <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
            <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
            </tr></table>
            <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
            <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
            </tr>
            </table>
            </htmlpageheader>
            <htmlpagefooter name="myHTMLFooter1">
            <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
            <tr>
            <th align="left">&copy; MU-Ecommerce</th>
            <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
            </tr>
            </table>
            </htmlpagefooter>
            <h3>Hello! '.Auth::user()->name.'</h3>
    
            <p style="font-size: 18px;">The following is th report of the whole system it takes updated data of the current time including User registered Company registered Total orders and Total sales from all Salers</p>
    
            <h3 align="center">Company Registered</h3>
            <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%;font-size: 12pt;">
            <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>';
            foreach ($cstatus as $key => $value) {
                $ff= $value->name;
                $location =$value->location;
                $phone = $value->phone_no;
                $p = $value->package_type;
                $ex = $value->end_date;
                $add= $value->address;
                $reg = $value->region_id;
                $phone = $value->phone_no;
            
           $html.='<tr align="center"><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td> <td>'.$p.'</td> <td>'.$ex.'</td></tr>';
             }
           $html.='</table>
    
           <h3 style="text-align: center">Analysis Sales Table</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
           <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
           foreach ($order as $key1 => $o) {
               $date = $o->created_at;
               $oda = $o->orde;
               $sale = $o->price;
    
               $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
           }
          $html.='
          <tr><td>&nbsp;</td></tr>
          <tr><td colspan="4"><hr></td></tr>
          <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
           $html.='</table>
    
           <h3 style="text-align: center">Today Top Salers</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center;font-size: 12pt;">
           <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Company</th><th>Status</th><th>Total Sales</th></tr>';
           foreach ($sal as $key2 => $s) {
            foreach ($s->company as $company){
                
         
            $user = $s->name;
            $photo = $s->photo;
            $com = $company->name;
            $stat = $company->status;
            $cou = $s->skus_count;
                if ($stat == '0') {
                    $stat = 'Inactive';
                }else {
                    $stat = 'Active';
                }
         
            $html.='<tr><td>'.++$key2.'</td> <td>'.$user.'</td><td><img src="storage/'.$photo.'" height="40"/></td><td>'.$com.'</td> <td>'.$stat.'</td><td>'.$cou.'</td></tr>';
        
     }
    }
          $html.='
          <tr><td>&nbsp;</td></tr>';
          
           $html.='</table>
            ';
    
            $output = new Output\Png();
    
            $mpdf->WriteHTML($html);
            $mpdf->SetTitle('MU-Ecommerce Saller Report');
            $mpdf->SetWatermarkImage('storage/t.jpg');
            $mpdf->showWatermarkImage = true;
    
            return $mpdf->Output("admin.pdf", "I");    
    
        } 

        public function btw(Request $request){
             
            $start = date($request->start_date);
            $end = date($request->end_date);
            $cstatus = Companies::all();
            $date = Carbon::now()->startOfMonth();
            $order =  DB::table('order')
            ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(total_price) as price'), DB::raw('count(user_id) as orde'))
            ->whereDate('created_at','<=',$end)
            ->whereDate('created_at','>=',$start)
            ->groupBy(DB::raw('DATE(created_at)'))->get();
            $total = Order::where('created_at','>=',$date)
            ->whereDate('created_at','<=',$end)
            ->whereDate('created_at','>=',$start)
            ->get()->sum('total_price');
            $totaloda = Order_products::where('created_at','>=',$date)->where('user_id',Auth::User()->id)
            ->whereDate('created_at','<=',$end)
            ->whereDate('created_at','>=',$start)
            ->get()->count('user_id');
    
            //top salers
            $skus = Order_products::selectRaw('SUM(order_products.quantity*order_products.price) AS quantity_sold')
            ->where('created_at','>=',$date)
            ->whereDate('created_at','<=',$end)
             ->whereDate('created_at','>=',$start)
            ->whereColumn('user_id', 'users.id')
            ->getQuery();
            $sal = User::select('*')->with('products','company')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')
            ->take(5)
            ->get();
            
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'c',
                'margin_top' => 35,
                'margin_bottom' => 17,
                'margin_header' => 10,
                'margin_footer' => 10,
            ]);
            $html='<style>
            @page {
            size: auto;
            sheet-size: A4;
            header: myHTMLHeader1;
            footer: myHTMLFooter1;
            }
            </style>
    
            <htmlpageheader name="myHTMLHeader1">
            <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
            <td width="8%"><img src="storage/t.jpg" height="60"/></td>
            <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
            <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
            </tr></table>
            <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
            <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
            </tr>
            </table>
            </htmlpageheader>
            <htmlpagefooter name="myHTMLFooter1">
            <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
            <tr>
            <th align="left">&copy; MU-Ecommerce</th>
            <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
            </tr>
            </table>
            </htmlpagefooter>
            <h3>Hello! '.Auth::user()->name.'</h3>
    
            <p style="font-size: 18px;">The following is th report of the whole system from <b>'.$start.'</b> to <b>'.$end.'</b> including User registered Company registered Total orders and Total sales from all Salers</p>
    
            <h3 align="center">Company Registered</h3>
            <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%;font-size: 12pt;">
            <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>';
            foreach ($cstatus as $key => $value) {
                $ff= $value->name;
                $location =$value->location;
                $phone = $value->phone_no;
                $p = $value->package_type;
                $ex = $value->end_date;
                $add= $value->address;
                $reg = $value->region_id;
                $phone = $value->phone_no;
            
           $html.='<tr align="center"><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td> <td>'.$p.'</td> <td>'.$ex.'</td></tr>';
             }
           $html.='</table>
    
           <h3 style="text-align: center">Analysis Sales Table</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
           <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
           foreach ($order as $key1 => $o) {
               $date = $o->created_at;
               $oda = $o->orde;
               $sale = $o->price;
    
               $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
           }
          $html.='
          <tr><td>&nbsp;</td></tr>
          <tr><td colspan="4"><hr></td></tr>
          <tr><td colspan="2"><b>TOTAL</b></td> <td><b></b></td> <td> <b>'.$total.'</b></td> </tr>';
           $html.='</table>
    
           <h3 style="text-align: center">Today Top Salers</h3>
           <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center;font-size: 12pt;">
           <tr><th>S/No</th><th>Name</th><th>Photo</th><th>Company</th><th>Status</th><th>Total Sales</th></tr>';
           foreach ($sal as $key2 => $s) {
            foreach ($s->company as $company){
            $user = $s->name;
            $photo = $s->photo;
            $com = $company->name;
            $stat = $company->status;
            $cou = $s->skus_count;
                if ($stat == '0') {
                    $stat = 'Inactive';
                }else {
                    $stat = 'Active';
                }
         
            $html.='<tr><td>'.++$key2.'</td> <td>'.$user.'</td><td><img src="storage/'.$photo.'" height="40"/></td><td>'.$com.'</td> <td>'.$stat.'</td><td>'.$cou.'</td></tr>';
        
     }
    }
          $html.='
          <tr><td>&nbsp;</td></tr>';
          
           $html.='</table>
            ';
    
            $output = new Output\Png();
    
            $mpdf->WriteHTML($html);
            $mpdf->SetTitle('MU-Ecommerce Saller Report');
            $mpdf->SetWatermarkImage('storage/t.jpg');
            $mpdf->showWatermarkImage = true;
    
            return $mpdf->Output("admin.pdf", "I");    
    
        } 

        public function salesrepo(Request $request){

            $start = date($request->start_date);
            $end = date($request->end_date);

            $cstatus = Companies::where('user_id',Auth::User()->id)->get();
            foreach ($cstatus as $key => $value) {
            $ff= $value->name;
            $location =$value->location;
            $phone = $value->phone_no;
            $p = $value->package_type;
            $ex = $value->end_date;
            $add= $value->address;
            $reg = $value->region_id;
            $phone = $value->phone_no;
           
        }
        $order =  DB::table('order_products')
        ->where('user_id',Auth::user()->id)

        ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('sum(price) as price'), DB::raw('count(user_id) as orde'))
        ->whereDate('created_at','<=',$end)
        ->whereDate('created_at','>=',$start)
        ->groupBy(DB::raw('DATE(created_at)'))->get();
        
        $total = Order_products::where('user_id',Auth::User()->id)
        ->whereDate('created_at','<=',$end)
        ->whereDate('created_at','>=',$start)
        ->get()->sum('price');
        $totaloda = Order_products::where('user_id',Auth::User()->id)
        ->whereDate('created_at','<=',$end)
        ->whereDate('created_at','>=',$start)
        ->get()->count('user_id');
         //return $order;
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_top' => 35,
            'margin_bottom' => 17,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);
       

       $html='<style>
        @page {
        size: auto;
        sheet-size: A4;
        header: myHTMLHeader1;
        footer: myHTMLFooter1;
        }
        </style>
        <htmlpageheader name="myHTMLHeader1">
        <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: roboto; font-size: 20pt; color: #000088;"><tr>
        <td width="8%"><img src="storage/t.jpg" height="60"/></td>
        <td width="59%"><div align="left" style="color: black">Mzumbe University</div><div align="left" style="font-size:19px;">E-Commerce</div> </td>
        <td width="33%" style="text-align: right;"><barcode code="Mu-Ecommerce" size="0.6" type="QR" error="M" class="barcode" /></td>
        </tr></table>
        <table width="100%" style="vertical-align: bottom; font-family: roboto; font-size: 11pt;">
        <tr><th align="right">Dated : '.date("d-m-Y H:i:s").'</th>
        </tr>
        </table>
        </htmlpageheader>
        <htmlpagefooter name="myHTMLFooter1">
        <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
        <tr>
        <th align="left">&copy; MU-Ecommerce</th>
        <td align="right">Printed on : {DATE d-m-Y} | Page {PAGENO} of {nb}</td>
        </tr>
        </table>
        </htmlpagefooter>
        <h3>Hello! '.Auth::user()->name.'</h3>
        <h3>Address</h3>
        <h4>'.$add.'</h4>
        <h4>'.$reg.'</h4>
        <p>'.$location.'</p>
        <p>'.$phone.'</p>
        <h4>Your Summary Report is as Follow from <b>'.$start.'</b> to <b>'.$end.'</b></h4>
        <h3 align="center">Company Information</h3>
        <table border: 1px solid black style="border: 1px solid #dddddd;padding: 8px; width: 100%">
        <tr><th>S/No</th><th>Company Name</th><th>Location</th><th>Phone Number</th><th>Package Type</th><th>Exipire Date</th></tr>
        
        <tr><td>'.++$key.'</td><td>'.$ff.'</td><td>'.$location.'</td><td>'.$phone.'</td><td>'.$p.'</td><td>'.$ex.'</td></tr>
        </table>
        <h3 style="text-align: center">Today Sales Analysis  Table</h3>
        <table border: 1px solid black cellspacing="0" style="border: 1px solid #dddddd; width: 100%;text-align: center">
        <tr><th>S/No</th><th>Dates</th><th>Total Orders</th><th>Total Sales</th></tr>';
        foreach ($order as $key1 => $o) {
            $date = $o->created_at;
            $oda = $o->orde;
            $sale = $o->price;

            $html.='<tr><td>'.++$key1.'</td> <td>'.$date.'</td> <td>'.$oda.'</td> <td>'.$sale.'</td></tr>';
        }
       $html.='
       <tr><td>&nbsp;</td></tr>
       
       <tr><td colspan="2"><b>TOTAL</b></td> <td><b>'.$totaloda.'</b></td> <td> <b>'.$total.'</b></td> </tr>';
        $html.='</table>
        <table>
        <tr><th>Regards</th></tr>
        <tr><td>Mu-Ecommerce</td></tr>
        </table>
        ';
        
        $output = new Output\Png();
        $mpdf->WriteHTML($html);
        $mpdf->SetTitle('MU-Ecommerce Saller Report');
        $mpdf->SetWatermarkImage('storage/t.jpg');
        $mpdf->showWatermarkImage = true;

        return $mpdf->Output("test.pdf", "I");


        }
        
    
}
