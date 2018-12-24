<?php

namespace Book\Providers;

use Book\Category;
use Book\Observers\OrderDetailObserver;
use Book\Observers\ProductObserver;
use Book\OrderDetail;
use Book\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::where('parent_id', null)->with('child.child')->get();

            View::share('categories', $categories);
        }

        OrderDetail::observe(OrderDetailObserver::class);
        Product::observe(ProductObserver::class);
        

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
