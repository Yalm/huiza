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
            $categories = Category::latest()->take(4)->get();
            $view->with('categories',$categories);
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
