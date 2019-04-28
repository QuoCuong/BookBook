<?php

namespace Book\Http\Controllers;

use Book\Category;
use Book\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_price = $request->filter_price;
        $order_by     = $request->order_by ?? 'newest';
        $page         = $request->page ?? 1;

        if ($filter_price) {
            //remove spaces and character 'đ'
            $filter_price = strtr($filter_price, [' ' => '', 'đ' => '']);
            //split string when found character '-'
            $filter_prices = explode('-', $filter_price);

            $products = Product::where('price', '>=', $filter_prices[0])
                ->where('price', '<=', $filter_prices[1])
                ->withCount('images')
                ->withCount('comments');
        } else {
            $products = Product::with('images')->withCount('comments');
        }

        switch ($order_by) {
            case 'newest':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'highlight':
                $products = $products->orderBy('comments_count', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
        }

        $number_of_products = $products->count();
        $products           = $products->paginate(12);

        return view('shop', [
            'products'           => $products,
            'number_of_products' => $number_of_products,
            'filter_prices'      => $filter_prices ?? null,
            'order_by'           => $order_by,
            'page'               => $page,
        ]);
    }

    public function listProductsById(Request $request, Category $category)
    {
        $filter_price = $request->filter_price;
        $order_by     = $request->order_by ?? 'newest';
        $page         = $request->page ?? 1;

        if ($filter_price) {
            //remove spaces and character 'đ'
            $filter_price = strtr($filter_price, [' ' => '', 'đ' => '']);
            //split string when found character '-'
            $filter_prices = explode('-', $filter_price);

            $products = $category->products()->where('price', '>=', $filter_prices[0])
                ->where('price', '<=', $filter_prices[1])
                ->with('images')
                ->withCount('comments');
        } else {
            $products = $category->products()->with('images')->withCount('comments');
        }

        switch ($order_by) {
            case 'newest':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'highlight':
                $products = $products->orderBy('comments_count', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
        }

        $number_of_products = $products->count();
        $products           = $products->paginate(12);

        return view('shop', [
            'current_category'   => $category,
            'products'           => $products,
            'number_of_products' => $number_of_products,
            'filter_prices'      => $filter_prices ?? null,
            'order_by'           => $order_by,
            'page'               => $page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Book\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Book\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Book\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Book\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
