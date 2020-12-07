<?php

namespace App\Http\Controllers;
use App\Events\OrderChange;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Order_products;
use App\Order;
use App\Feedback;
class UpdateStatus extends Controller
{
    public function update(Request $request, $ids,$oda){
        $od = Order::with('user','contact')->find($oda);
        // return $od;
        $contact = $od->contact->phone_no;
        $order = Order_products::find($ids);
        $order->status_id = $request->input('status');
        $order->save();

        //.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
        $api_key='47d853c18b866d89';
        $secret_key = 'ZmU1ODA4ODU4YzY3Zjg3MGZlODhkZTgwZWJkODNlNDM1Yzg5YmRiY2E1NDM0MzQzYWI3YTQ0MzVjOTUxYzc4NA==';
        // The data to send to the API
        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => 'Welcome Mu-Ecommerce,  Your Order status has changed to the next step, Please visit MU-Ecommerce account for the order progress',
            'recipients' => [array('recipient_id' => '1','dest_addr'=>$contact)]
        );
        //.... Api url
        $Url ='https://apisms.bongolive.africa/v1/send';
        
        // Setup cURL
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        
        // Send the request
        $response = curl_exec($ch);
        
        // Check for errors
        if($response === FALSE){
            echo $response;
            
            die(curl_error($ch));
        }
        var_dump($response);

         //send mail
        $email = $od->user->email;
        $sms = ['email'=>$od->user->email,'name'=>$od->user->name,];
        Mail::send('order_mail',$sms,function($message) use($email){
        $message->to($email)->subject('Order Change');
        });
        event(new OrderChange($order));

        return redirect('received');

    }
    public function postcode(Request $request, $ids,$oda){
        $od = Order::with('user','contact')->find($oda);
        // return $od;
        $contact = $od->contact->phone_no;
        $name = $od->user->name;
        $email = $od->user->email;
        $order = Order_products::find($ids);
        $order->postal_code = $request->input('code');
        $code = $request->input('code');
        $order->save();

        //.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
        $api_key='47d853c18b866d89';
        $secret_key = 'ZmU1ODA4ODU4YzY3Zjg3MGZlODhkZTgwZWJkODNlNDM1Yzg5YmRiY2E1NDM0MzQzYWI3YTQ0MzVjOTUxYzc4NA==';
        // The data to send to the API
        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => 'Dear '.$name.' Welcome Mu-Ecommerce, Your Package has been shipped to the Tanzania Posta please visit this Link http://41.59.86.100/Extranet/Track.aspx  and use this code '.$code.' to trace your package',
            'recipients' => [array('recipient_id' => '1','dest_addr'=>$contact)]
        );
        //.... Api url
        $Url ='https://apisms.bongolive.africa/v1/send';
        
        // Setup cURL
        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        
        // Send the request
        $response = curl_exec($ch);
        
        // Check for errors
        if($response === FALSE){
            echo $response;
            
            die(curl_error($ch));
        }
        var_dump($response);

        //  //send mail
        $email = $email;
        $sms = ['email'=>$email,'name'=>$name,'code'=>$code];
        Mail::send('posta_email',$sms,function($message) use($email){
        $message->to($email)->subject('Posta Package Tracing Code');
        });
       

        return redirect('received');
        
    }
    public function feedback(Request $req){
        $feed = new Feedback;
        $feed->order_products_id = $req->id;
        $feed->name = $req->feed;
        $feed->save();
        return \redirect('my_order');

    }
}
