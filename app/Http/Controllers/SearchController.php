<?php

namespace Book\Http\Controllers;

use Book\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate(['q' => 'required']);

        $filter_price = $request->filter_price;
        $order_by     = $request->order_by ?? 'newest';
        $page         = $request->page ?? 1;

        $keyword = $request->q;

        $products = Product::where('name', 'like', '%' . $keyword . '%')->orWhere('id', $keyword);

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
            $products = $products->with('images')->withCount('comments');
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

        return view('search_results', [
            'products'           => $products,
            'number_of_products' => $number_of_products,
            'filter_prices'      => $filter_prices ?? null,
            'order_by'           => $order_by,
            'page'               => $page,
            'q'                  => $keyword,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
