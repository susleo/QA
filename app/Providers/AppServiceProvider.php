<?php

namespace App\Providers;

use App\Discussion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('discussions',Discussion::latest()->simplePaginate(12));
//        View::composer(
//            'discussions', Discussion::latest()->paginate(12)
//        );
    }
}
