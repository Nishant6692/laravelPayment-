<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyTotalPay;

class MyTotalPayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mytotalpay',function(){

            return new MyTotalPay();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
