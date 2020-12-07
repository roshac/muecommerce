<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use HTTP_Request2;
class sms extends Controller
{
    public function smsSend(){
        
        //.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
        $api_key='47d853c18b866d89';
        $secret_key = 'ZmU1ODA4ODU4YzY3Zjg3MGZlODhkZTgwZWJkODNlNDM1Yzg5YmRiY2E1NDM0MzQzYWI3YTQ0MzVjOTUxYzc4NA==';
        // The data to send to the API
        $postData = array(
            'source_addr' => 'INFO',
            'encoding'=>0,
            'schedule_time' => '',
            'message' => 'Welcome Mu-Ecommerce',
            'recipients' => [array('recipient_id' => '1','dest_addr'=>'255765814169'),array('recipient_id' => '2','dest_addr'=>'255782317045')]
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
    }
}
