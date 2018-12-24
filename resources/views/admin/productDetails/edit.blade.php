@extends('admin.layouts.master')
@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">

    <a href="{{ route('admin.products.index') }}"><i class="ion-ios-calculator-outline"></i>Sách</a>
    <a href="{{route('admin.image.index')}}"><i class="ion-ios-calculator-outline"></i>Hình ảnh sách</a>
    <a href="{{route('admin.productdetail.index')}}"><i class="ion-ios-calculator-outline"></i>Chi tiết sách</a>
</li>
@endsection
@section('content')
<main class="app-layout-content">
    <div  class="container-fluid p-y-md">
        <ul style="list-style: none;" class="navbar-nav mr-auto">
            <li><a href="{{ route('admin.products.index')}}"> Tất cả sách</a></li>

        </ul>



    </div>

    <div class="container-fluid p-y-md">
        <div class="container">

            <div class="card">
                <div class="card-header">Tạo mới sách</div>
                <div class="card-body">
                    <form action="{{route('admin.productdetail.update', ['id' => $productdetails->id ])}}" method="post" >
                        @csrf
                        <div class="container mt-3">
                            <fieldset class="form-group">
                                <label>Author<span class="text-blue">*</span></label>

                                <input type="text" class="form-control" id="author" value="{{$productdetails->author}}" name="author">

                            </fieldset>
                            <fieldset class="form-group">
                                <label>Publisher <span class="text-blue">*</span></label>
                                <textarea class="form-control" rows="5" id="publisher" name="publisher">{{$productdetails->publisher}}</textarea>

                            </fieldset>
                            <fieldset class="form-group">

                              <label>Publish-Year <span class="text-blue">*</span></label>
                              <input type="year" name="publish_year" class="form-control" value="{{$productdetails->publish_year}}">

                          </fieldset>
                          <fieldset class="form-group">

                              <label>Weight<span class="text-blue">*</span></label>
                              <input type="number" name="weight" class="form-control" value="{{$productdetails->weight}}">

                          </fieldset>
                          <fieldset class="form-group">

                              <label for="image">Size<span class="text-blue">*</span></label>
                              <input type="text" name="size" class="form-control" value="{{$productdetails->size}}">

                          </fieldset>
                          <fieldset class="form-group">

                              <label for="image">Number_Of_Page<span class="text-blue">*</span></label>
                              <input type="number" name="number_of_page" class="form-control" value="{{$productdetails->number_of_page}}">

                          </fieldset>
                          <fieldset class="form-group">

                              <label for="image">Cover<span class="text-blue">*</span></label>
                              <input type="text" name="cover" class="form-control" value="{{$productdetails->cover}}">

                          </fieldset>
                          <fieldset class="form-group">
                            
                            <input type="hidden" class="form-control" id="product_id" value="{{$productdetails->product_id}}" name="product_id">
                        </fieldset>


                    </div>


                    <div class="form-group">
                      <button class="btn btn-app" style="margin-left: 500px;">Update</button>
                  </div>
              </form>
          </div>
      </div>

  </div>
</div>


</main>




@endsection
