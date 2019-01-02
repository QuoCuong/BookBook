<?php

namespace Book\Http\Controllers;

use Book\Category;
use Book\Comment;
use Book\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Book\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product            = Product::with('category', 'productDetail', 'images')->find($id);
        $related_categories = Category::where('parent_id', $product->category->parent_id)
            ->withCount('products')
            ->get();
        $comments         = Comment::where('product_id', $product->id)->orderBy('created_at', 'desc')->paginate(5);
        $related_products = $product->category->products()->with('images', 'comments')->get()->except($product->id);

        return view('product_details', [
            'product'            => $product,
            'related_categories' => $related_categories,
            'comments'           => $comments,
            'related_products'   => $related_products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Book\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Book\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Book\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
