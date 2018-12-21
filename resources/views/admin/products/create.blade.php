@extends('admin.layouts.master')
@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">

  <a href="{{ route('admin.products.index') }}"><i class="ion-ios-calculator-outline"></i>Products</a>
  <a href="{{route('admin.image.index')}}"><i class="ion-ios-calculator-outline"></i>Image</a>
</li>
@endsection
@section('content')
<main class="app-layout-content">


<!--     <div class="container-fluid p-y-md">
    <div class="container">

        <div class="card">
            <div class="card-header">New Product</div>
            <div class="card-body">
                <form action="{{route('admin.product.store')}}" method="post" >
                    @csrf
                    <div class="container mt-3">
                        <fieldset class="form-group">
                            <label>Name <span class="text-blue">*</span></label>

                            <input type="text" class="form-control" id="name" placeholder="Mời bạn nhập tên" name="name">
                            <p class="meserr">{{ $errors->first('name') }}</p>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Description <span class="text-blue">*</span></label>
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            <p class="meserr">{{ $errors->first('description') }}</p>
                        </fieldset>
                        <fieldset class="form-group">

                          <label>Quantity <span class="text-blue">*</span></label>
                          <input type="number" name="quantity" class="form-control">
                          <p class="meserr">{{ $errors->first('quantity') }}</p>
                      </fieldset>
                      <fieldset class="form-group">

                          <label for="image">Price <span class="text-blue">*</span></label>
                          <input type="number" name="price" class="form-control">
                          <p class="meserr">{{ $errors->first('price') }}</p>
                      </fieldset>
                      <fieldset class="form-group">
                          <label for="formGroupExampleInput">Subcategory_id <span class="text-blue">*</span></label>
                          <select class="form-control" name="subcategory_id">
                            @foreach ($subcategories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <p class="meserr">{{ $errors->first('subcategory_id') }}</p>
                    </fieldset>


                </div>


                <div class="form-group">
                  <button class="btn btn-app" style="margin-left: 500px;">Save Product</button>
              </div>
          </form>
      </div>
  </div>

  </div>
</div> -->


<!-- Page Content -->
<div class="container-fluid p-y-md">
  <!-- Bootstrap Style -->
  <h2 class="section-title">Manage Product</h2>

    <div class="row">
      <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="col-md-6">
          <!-- Default Elements -->
          <div class="card">
            <div class="card-header">
              <h4>New Product</h4>
            </div>
            <div class="card-block">
            <!--  <form action="" method="post" >
            @csrf -->

              <div class="container mt-3">
                <fieldset class="form-group">
                  <label>Name <span class="text-blue">*</span></label>

                  <input type="text" class="form-control" id="name_product" placeholder="Mời bạn nhập tên" name="name_product">
                  <p class="meserr">{{ $errors->first('name_product') }}</p>
                </fieldset>
                <fieldset class="form-group">
                  <label>Description <span class="text-blue">*</span></label>
                  <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                  <p class="meserr">{{ $errors->first('description') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Quantity <span class="text-blue">*</span></label>
                  <input type="number" name="quantity" class="form-control">
                  <p class="meserr">{{ $errors->first('quantity') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label for="image">Price <span class="text-blue">*</span></label>
                  <input type="number" name="price" class="form-control">
                  <p class="meserr">{{ $errors->first('price') }}</p>
                </fieldset>
                <fieldset class="form-group">
                  <label for="formGroupExampleInput">Subcategory_id <span class="text-blue">*</span></label>
                  <select class="form-control" name="subcategory_id">
                    @foreach ($subcategories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                  <p class="meserr">{{ $errors->first('subcategory_id') }}</p>
                </fieldset>
              </div>
            <!-- <div class="form-group">
              <button class="btn btn-app" >Save Product</button>
            </div> -->
            <!-- </form> -->
            </div>
          <!-- .card-block -->
          </div>
        <!-- .card -->
        <!-- End Default Elements -->
        <!-- Inline Form -->
          <div class="card">
            <div class="card-header">
              <h4>Image Product</h4>
            </div>
            <div class="card-block card-block-full">
            <!-- <form action="" method="post" enctype="multipart/form-data">
            @csrf -->
              <div class="container mt-3">
                <fieldset class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name_image" placeholder="Mời bạn nhập tên" name="name_image">
                  <p class="meserr">{{ $errors->first('name_image')}}</p>
                </fieldset>
                <fieldset class="form-group">
                  <label for="image">Image</label>
                  <input type="file" name="path" multiple="multiple" class="form-control" style="height: 45px">
                  <p class="meserr">{{ $errors->first('path')}}</p>

                </fieldset>
              </div>
            </div>
          </div>
          <!-- End Inline Form -->
        </div>

        <!-- .col-md-6 -->
        <div class="col-md-6">
          <!-- Normal Form -->
          <div class="card">
            <div class="card-header">
              <h4>Product Detail</h4>
            </div>
            <div class="card-block">
           <!-- <form action="" method="post" >
            @csrf -->
              <div class="container mt-3">
                <fieldset class="form-group">
                  <label>Author<span class="text-blue">*</span></label>

                  <input type="text" class="form-control" id="author" placeholder="Mời bạn nhập tên tac gia" name="author">
                  <p class="meserr">{{ $errors->first('author') }}</p>
                </fieldset>
                <fieldset class="form-group">
                  <label>Publisher <span class="text-blue">*</span></label>
                  <textarea class="form-control" rows="14" id="publisher" name="publisher"></textarea>
                  <p class="meserr">{{ $errors->first('publisher') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Publish-Year <span class="text-blue">*</span></label>
                  <input type="year" name="publish_year" class="form-control">
                  <p class="meserr">{{ $errors->first('publish_year') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Weight<span class="text-blue">*</span></label>
                  <input type="number" name="weight" class="form-control">
                  <p class="meserr">{{ $errors->first('weight') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Size<span class="text-blue">*</span></label>
                  <input type="text" name="size" class="form-control">
                  <p class="meserr">{{ $errors->first('size') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Number_Of_Page<span class="text-blue">*</span></label>
                  <input type="number" name="number_of_page" class="form-control">
                  <p class="meserr">{{ $errors->first('number_of_page') }}</p>
                </fieldset>
                <fieldset class="form-group">

                  <label>Cover<span class="text-blue">*</span></label>
                  <input type="text" name="cover" class="form-control">
                  <p class="meserr">{{ $errors->first('cover') }}</p>
                </fieldset>
              </div>
            </div>
          </div>
          <!-- End Normal Form -->
        </div>

        <button style="margin-left: 600px" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</main>
@endsection
