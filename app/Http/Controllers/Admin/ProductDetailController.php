<?php

namespace Book\Http\Controllers\Admin;

use Book\Http\Controllers\Controller;
use Book\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productDetails.index', ['productdetails' => ProductDetail::paginate(10)]);

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

        return view('admin.productDetails.edit', ['productdetails' => ProductDetail::find($id)]);
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
        $productdetails = ProductDetail::find($id);

        $productdetails->author         = $request->author;
        $productdetails->publisher      = $request->publisher;
        $productdetails->publish_year   = $request->publish_year;
        $productdetails->weight         = $request->weight;
        $productdetails->size           = $request->size;
        $productdetails->number_of_page = $request->number_of_page;
        $productdetails->cover          = $request->cover;
        $productdetails->product_id = $request->product_id;
        $productdetails->save();

        return redirect()->route('admin.productdetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productdetails = ProductDetail::find($id);

        
        $productdetails->delete();
       
        return redirect()->back();
    }
}
