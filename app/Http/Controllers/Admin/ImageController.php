<?php

namespace Book\Http\Controllers\Admin;

use Book\Http\Controllers\Controller;
use Book\Image;
use Book\Product;
use Illuminate\Http\Request;
use Book\Http\Requests\ProductRequest;
use Book\Http\Requests\ImageFormRequest;
use Session;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $images = Image::orderBy('created_at','desc')->paginate(10);
        return view('admin.images.index', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name', 'id');
        return view('admin.images.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageFormRequest $request)
    {
        $image = new Image ;
        if ($request->hasFile('image')) {
            $product_image = $request->image;
            $product_image_new_name =  time().$product_image->getClientOriginalName();
            $product_image->move('storage/',$product_image_new_name);

            $image->name       = $request->name;
            $image->path       = '/storage/' . $product_image_new_name;
            $image->product_id = $request->product_id;

            $image->save();
        }
            
        Session::flash('success','Tạo mới thành công!');
        return redirect()->route('admin.image.index');

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
        return view('admin.images.edit', ['image' => Image::find($id)]);
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

        $image = Image::find($id);

        if ($request->hasFile('image')) {
            $imageName = $request->image;
            $imageName_new_name =  time().$imageName->getClientOriginalName();
            $imageName->move('storage/',$imageName_new_name);
            $imageName = '/storage/'.$imageName_new_name;

            $image->path = $imageName;
        }

        $image->name = $request->name;
        $image->product_id = $request->product_id;
        $image->save();
        Session::flash('success','cập nhật thành công thành công!');

        return redirect()->route('admin.image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        if (file_exists($image->path)) {
            unlink($image->path);
        }
        $image->delete();
        Session::flash('success','Xóa thành công!');
        return redirect()->back();
    }
}
