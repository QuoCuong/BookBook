<?php

namespace Book\Http\Controllers\Admin;

use Book\Category;
use Book\Http\Controllers\Controller;
use Book\Http\Requests\ProductRequest;
use Book\Product;
use Book\ProductDetail;
use Book\Image;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    public function detailProductId(Product $product)
    {
        $productDetail = $product->productDetail;
        // dd($productDetail);
        $images = $product->images;
        // dd($images);
        return view('admin.products.detail',compact('productDetail','images','product'));
   
    }
    
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

        $images = $request->images;

        
           
         if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/storage/', $name);

                $data_product_image = [
                'name'       => $request->name_image,
                'path'      => 'storage/' . $name,
                'product_id' => $product_id,
                ];
                Image::create($data_product_image); 
            }
          }

         Session::flash('success','Tạo mới thành công!');
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

        Session::flash('success','Cập nhật thành công!');

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
        
        Session::flash('success','Xóa thành công!');
        return redirect()->back();

        

    }

    public function getSearch(Request $req)
    {
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('price', $req->key)
                            ->get();
                            
        return view('admin.products.search',compact('product'));
    }
}
