<?php

namespace App\Http\Controllers;

use App\Services\MyTotalPay;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(){
        $check = new MyTotalPay('http://httpbin.org/post', [
            'multipart' => [
                [
                    'name'     => 'field_name',
                    'contents' => 'abc'
                ],
                [
                    'name'     => 'file_name',
                    'contents' => 'jhii'
                ],
                [
                    'name'     => 'other_file',
                    'contents' => 'hello',
                    'filename' => 'filename.txt',
                    'headers'  => [
                        'X-Foo' => 'this is an extra header to include'
                    ]
                ]
            ]
        ]) ;
        $res = $check->getCheckOutUrl();
        dd($res);
    }


}
