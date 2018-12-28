<?php

namespace Book\Http\Controllers;

use Book\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_products = Product::withCount('comments')->orderBy('created_at', 'desc')->limit(12)->get();
        $all_products = Product::withCount('images', 'comments')->limit(16)->get();
        $best_seller  = Product::withCount('orderDetails', 'comments')->get()->sortByDesc('orderDetails_count')->take(20);

        return view('home', [
            'new_products' => $new_products,
            'all_products' => $all_products,
            'best_seller'  => $best_seller,
        ]);
    }
}
