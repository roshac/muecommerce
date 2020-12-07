<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use Illuminate\Support\Facades\Auth;
use App\Pcategories;
use App\Auction;
use App\Events\Bidchange;
use Illuminate\Support\Facades\Mail;
use Flash;
use App\User;
use App\Status;
use App\BidPayment;
use Stripe;
// use App\Events\Bidchange;
use App\Auction_user;
use App\Contact;

class AddAuction extends Controller
{
    public  function add(Request $req)
    {
        
        $imagepath = $req->file('photo')->store('public');
        $imagename = substr($imagepath,7);
        
        $auction = new Auction;
        $auction->user_id= Auth::user()->id;
        $auction->category_id= $req->categories;
        $auction->company_id= $req->brand;   
        $auction->photo =$imagename;
        $auction->name = $req->name;
        $auction->starting_price = $req->price;
        $auction->end_price = $req->endprice;
        $auction->deadline = $req->deadline;
        $auction->desc = $req->description;
        LogActivity::addToLog('New auction created');
        $auction->save(); 
        Flash::success('Auction saved successfully.');
        
        return \redirect('addAuction');
        
    }
    
    public function getAuction(){
        $skus = Auction_user::selectRaw('COUNT(auction_id) AS fee')
        ->whereColumn('auction_id', 'auction.id')
        ->getQuery();
        $auction = Auction::select('*')->with('user','company','category','auction_user')
        ->where('user_id',auth()->user()->id)
        ->selectSub($skus, 'skus_count')
        ->get();
        // return $auction;
        // $auction = Auction::with('user','category','company')->where('user_id',auth()->user()->id)->get();
        // $a_user =  Auction_user::where('auction_id',$auction[0]->id)->with('user','auction')->orderBy('fee_paid','DESC')->get()->count();
        // return $a_user;
        // $array = [$auction, $a_user];
        // return $array;
        return view('my_auction',compact('auction'));
    }
    
    //pace bid
    public function placeBid(Request $req,$id,$uid){
        $auction = Auction::findOrFail($id);
        
        $price = $auction->starting_price;
        
        if($req->bid < $price) {
            return redirect()->back()->with('Error','The ammount Must be geater than Starting Price');
            
        }else{
            
            $auction = new Auction_user;
            $auction->auction_id = $id;
            $auction->user_id = Auth::user()->id;
            $auction->saler_id = $uid;
            $auction->fee_paid = $req->bid;
            
            $auction->save();
            
            // event(new Bidchange($auction));
            
            return \redirect('/');
        }
    }
    
    public function bidFor($id){
        $a_user =  Auction_user::where('auction_id',$id)->with('user','auction')->orderBy('fee_paid','DESC')->get();
        // return $a_user;
        return view('aubid', compact('a_user'));
    }
    
    public function bidMay(){
        // $my_bid = Auction_user::where('user_id',auth()->user()->id)->with('user','auction')->get();
        $skus = Auction_user::selectRaw('MAX(fee_paid) AS fee')
        ->whereColumn('auction_id', 'auction.id')
        ->getQuery();
        $my_bid = Auction::select('*')->with('user','auction_user')
        ->selectSub($skus, 'skus_count')
        ->get();
        // return $my_bid;
        return view('auMybid',compact('my_bid'));
    }
    
    public function approve($id,$uid){
        $user = User::with('contact')->find($uid);
        // return $user;
        $contact = $user->contact['0']->phone_no;
        $name = $user->name;

        $approve =  Auction_user::find($id);
        $approve_fee = $approve->fee_paid;
        $approve->status = '2';

        LogActivity::addToLog('Auction Approve created');
        $approve->save();
        //sms
        //.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
        $api_key='47d853c18b866d89';
        $secret_key = 'ZmU1ODA4ODU4YzY3Zjg3MGZlODhkZTgwZWJkODNlNDM1Yzg5YmRiY2E1NDM0MzQzYWI3YTQ0MzVjOTUxYzc4NA==';
        // The data to send to the API
        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => 'Mu-Ecommerce, Dear '.$name.' Congratulation You have win the Competition with the highest Bid of Tsh. '.$approve_fee.', Please visit MU-Ecommerce website in your account for the Payment progress',
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
        $email = $user->email;
        $sms = ['email'=>$user->email,'name'=>$user->name,'fee'=>$approve_fee,];
        Mail::send('bid_email',$sms,function($message) use($email){
        $message->to($email)->subject('Bid Competition Win');
        });
        
        return \redirect('approvedbid');
    }
    
    public function approved(){
        $my_bid = Auction_user::where('saler_id',auth()->user()->id)->with('user','auction')->where('status',2)->get();
        return view('approved',compact('my_bid'));
    }
    
    public function approved_user(){
        $my_bid = Auction_user::where('user_id',auth()->user()->id)->with('user','auction')->where('status',2)->get();
        // return $my_bid;
        return view('approved_user',compact('my_bid'));
    }
    
    public function bidpay(Request  $req,$id,$fee){
        $bidPay = new BidPayment;
        
        $au = Auction::findOrFail($id);
        
        $bidPay->user_id = auth()->user()->id;
        $bidPay->auction_id = $id;
        
        $bidPay->contact_id = $req->phone;
        $bidPay->fee_paid = $fee;
        $bidPay->auction_name = $au->name;
        $bidPay->saler_id = $au->user_id;
        $bidPay->starting_price = $au->starting_price;
        $bidPay->end_price = $au->end_price;
        $bidPay->photo = $au->photo;
        $bidPay->deadline = $au->deadline;
        $bidPay->desc = $au->desc;
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
            "amount" => $fee,
            "currency" => "usd",
            "source" =>  $req->stripeToken,
            'description'=>'Bid Payment',
            'transfer_data' => [
                'destination' => 'acct_1H2i8TION9sQhkeP',
            ],
            ]);
            $bidPay->payment_id = $charge->id;
            $bidPay->save();
            
            $update  = Auction::find($id);
            $update->delete();
            return redirect('won_bid');
            
            
    }
        
    public function biddelete($id){
            $bid = Auction_user::find($id);
            $bid->delete();
            return redirect('my_bid');
    }
        
    public function detail($id){
            $detail = Auction::with('user','auction_user','company')->findOrFail($id);
            // return $detail;
            return view('auctiondetail' ,compact('detail'));
    }
        
    public function won(){
            $won = BidPayment::with('user','contact')->where('user_id',auth()->user()->id)->get();
            // return $won;
            return view('bid_won',compact('won'));
    }
    public function winner(){
            $winner = BidPayment::with('user','contact')->where('saler_id',auth()->user()->id)->get();
            // return $won;
            return view('bid_winner',compact('winner'));
     }

     public function windetail($id){
        $detail = BidPayment::with('user','contact')->findOrFail($id);
        $status = Status::distinct()->get();
        // return $detail;
        return view('bid_details',compact('detail','status'));
     }
        public function bid_track($id){
            $track = BidPayment::with('user','contact','status')->findOrFail($id);
            // return $detail;
            return view('bid_track',compact('track'));
    }

    public function statusupdate(Request $request,$id){
        $bidpay = BidPayment::with('contact','user')->find($id);
        // return $bidpay;
        $contact = $bidpay->contact->phone_no;
        $name = $bidpay->user->name;
        $bidpay->status_id = $request->input('status');
        $bidpay->save();

         //.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
         $api_key='47d853c18b866d89';
         $secret_key = 'ZmU1ODA4ODU4YzY3Zjg3MGZlODhkZTgwZWJkODNlNDM1Yzg5YmRiY2E1NDM0MzQzYWI3YTQ0MzVjOTUxYzc4NA==';
         // The data to send to the API
         $postData = array(
             'source_addr' => 'INFO',
             'encoding'=>0,
             'schedule_time' => '',
             'message' => 'Welcome Mu-Ecommerce,  Your Package status has changed to the next step, Please visit MU-Ecommerce account for the Package progress',
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
        $email = $bidpay->user->email;
        $sms = ['email'=>$bidpay->user->email,'name'=>$bidpay->user->name,];
        Mail::send('bid_email_status',$sms,function($message) use($email){
        $message->to($email)->subject('Package Status Change');
        });
        event(new Bidchange($bidpay));
        
        return \redirect('winner');
    }

    public function AuctionDelete($id){
        $au = Auction::find($id);
        $au->delete();
        return redirect('my_auction');

    }

    public function feedback(Request $req){
        $feed_id = $req->id;
        $feed = BidPayment::find($feed_id);
        $feed->feedback = $req->feed;
        $feed->save();
        return \redirect('won_bid');
    }

    public function posta(Request $req){
        $feed_id = $req->id;
        $contact = $req->phone;
        $emailu = $req->email;
        $name = $req->name;
        $code = $req->feed;
        $feed = BidPayment::find($feed_id);
        $feed->postal_code = $req->feed;
        $feed->save();

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

         //send mail
        $email = $emailu;
        $sms = ['email'=>$emailu,'name'=>$name,'code'=>$code];
        Mail::send('posta_email',$sms,function($message) use($email){
        $message->to($email)->subject('Posta Package Tracing Code');
        });
        return \redirect('winner');
        
    }
    public function feedbacku(){
        $feed = BidPayment::with('user')->get();
         return \view('bid_feedback',compact('feed'));
    }
        
}
