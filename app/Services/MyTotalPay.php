<?php
namespace App\Services;
use GuzzleHttp\Client;
final class MyTotalPay{
 protected $options;
 protected $url;
 public function __construct(string $url,array $options){
    $this->options = $options;
    $this->url = $url;
}

/**
 * getCheckOutUrl function for getting the checkout url 
 *
 * @return string url 
 */
public function getCheckOutUrl(){
    $data =  $this->options;
    $url = $this->url;
   $client = new Client();
   $response = $client->request('POST',$url,[
    'body'=> json_encode($data),
    'headers' => [
        'Content-Type' => 'application/json',
    ],
   ]);
    
   return json_decode($response->getBody()->getContents());
}



}