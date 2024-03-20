<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCSVDataJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ProductCSVController extends Controller
{
    public function index(){

        return view('fileUpload');
    }

    public function store(Request $request){
    
        if($request->has('csv')){
            // $contents = $request->file('csv')->getContent();
            // $lines = explode(PHP_EOL, $contents);
            // dd(li)
            // $header = collect(str_getcsv(array_shift($lines)));
            
            // $rows = collect($lines);
            

            // $data = [];

            // $rows->each(function ($row) use ($header, $data) {
            //     $row = str_getcsv($row);
            //     if ($header->count() != count($row)) {
            //         return;
            //     }

            //     array_push($data, $header->combine($row));
            // });

           

          $csv = file($request->csv); 
        $lines = explode("\r", $csv[0]);
            array_pop( $lines);

        $chunks = array_chunk( $lines,500);
          $header=[];

          $batch = Bus::batch([])->dispatch();
     
          foreach($chunks as $key=>$chunk){
         $data = array_map('str_getcsv',$chunk);
              if($key ==0){
                $header = $data[0];
                unset($data[0]);
              }
            
             $batch->add( new ProductCSVDataJob($data,$header));
          }




        }

        return redirect()->route('csv-index');



    }
}
