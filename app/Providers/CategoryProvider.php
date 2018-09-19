<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class CategoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*",function($view) {
            $providerCategories = Category::latest()->take(4)->get();
            $view->with('providerCategories',$providerCategories);
          });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
