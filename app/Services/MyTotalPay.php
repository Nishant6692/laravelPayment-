<?php

namespace App\Services;

use GuzzleHttp\Client;

final class MyTotalPay
{
    protected $options;
    protected $url;

    public function __construct(string $url, array $options)
    {
        $this->options = $options;
        $this->url = $url;
    }

    /**
     * getCheckOutUrl function for getting the checkout url 
     *
     * @return string url 
     */
    public function getCheckOutUrl()
    {
        $client = new Client();

        try {
            $response = $client->request('POST', $this->url, [
                'body'=> json_encode($this->options),
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
               ]);

            return json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            // Handle any exceptions here
            // For example: Log the error or throw a custom exception
            return null;
        }
    }
}