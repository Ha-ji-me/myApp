<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Schemaクラスをuseする
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //herokuで追記
        Schema::defaultStringLength(191);
    }
}
