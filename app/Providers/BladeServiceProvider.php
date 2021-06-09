<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //al crear un provider hay que registrarlo en app.php de config
        Blade::if('seller', function(){
            if(auth()->check()){
                return auth()->user()->isSeller();
            }
            return false;
        });
    }
}
