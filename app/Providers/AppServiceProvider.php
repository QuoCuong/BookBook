<?php

namespace Book\Providers;

use Book\Address;
use Book\Category;
use Book\Observers\AddressObserver;
use Book\Observers\CategoryObserver;
use Book\Observers\OrderDetailObserver;
use Book\Observers\OrderObserver;
use Book\Observers\ProductObserver;
use Book\Order;
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

        Address::observe(AddressObserver::class);
        OrderDetail::observe(OrderDetailObserver::class);
        Product::observe(ProductObserver::class);
        Order::observe(OrderObserver::class);
        Category::observe(CategoryObserver::class);
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
