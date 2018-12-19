<?php

namespace Book\Http\Controllers;

use Illuminate\Http\Request;
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
        $new_products = Product::orderBy('created_at', 'desc')->get();

        return view('home', ['new_products' => $new_products]);
    }
}
