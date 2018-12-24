<?php

namespace Book\Http\Controllers\Admin;

use Book\Category;
use Book\Http\Controllers\Controller;
use Book\Http\Requests\ProductRequest;
use Book\Product;
use Book\ProductDetail;
use Book\Image;
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
        $products = Product::paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

   /* public function listDetailById(Product $product)
    {
        $productDetails = $product->productDetails;
        dd($productDetails);

        return view('admin.products.show', compact('productDetails'));
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::where('parent_id', '!=', null)->pluck('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        /*dd($request->all());*/
        // dd($request->all());
        /*$product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->subcategory_id = $request->subcategory_id;*/

        $data_product = [
            'name'        => $request->name_product,
            'description' => $request->description,
            'quantity'    => $request->quantity,
            'price'       => $request->price,
            'category_id' => $request->category_id,
        ];
        /*dd($data_product);*/
        $product_id = Product::create($data_product)->id;

        $data_product_detail = [
            'author'         => $request->author,
            'publisher'      => $request->publisher,
            'publish_year'   => $request->publish_year,
            'weight'         => $request->weight,
            'size'           => $request->size,
            'number_of_page' => $request->number_of_page,
            'cover'          => $request->cover,
            'product_id'     => $product_id,
        ];

        ProductDetail::create($data_product_detail);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/public/storage\\', $name);

            $data_product_image = [
            'name'       => $request->name_image,
            'path'      => 'public/storage\\' . $name,
            'product_id' => $product_id,
            ];
          }  
          Image::create($data_product_image);

           /* $image->name       = $request->name;
            $image->path       = 'public/storage\\' . $name;
            $image->product_id = $request->product_id;

            $image->save();*/

        /*$product_image = $request->images;

        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('public/storage\\', $product_image_new_name);

        $data_product_image = [
        'name'       => $request->name_image,
        'image'      => 'public/storage\\' . $path_image_new_name,
        'product_id' => $product_id,
        ];

        Image::create($data_product_image);
         */

        return redirect()->route('admin.products.index');
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
        $categories = Category::where('parent_id', '!=', null)->pluck('name', 'id');
        $product    = Product::find($id);
        /*$images = $product->images;
        $productDetail = $product->productDetail;*/
        /*$productdetail = ProductDetail::find($id);*/
        /*dd($productDetail);*/

        return view('admin.products.edit', compact('categories', 'product'));

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
        $product = Product::find($id);

        $product->name        = $request->name;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response**/

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back();

    }
}
