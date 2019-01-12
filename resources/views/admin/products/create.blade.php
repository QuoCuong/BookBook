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
  
  <div class="container-fluid p-y-md">
  <!-- Bootstrap Style -->
  <h2 class="section-title">Quản lý sách</h2>

    <div class="row">
                  <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf

                    <div class="col-md-6">
                    <!-- Default Elements -->
                      <div class="card">
                        <div class="card-header">
                            <h4>Tạo mới sách</h4>
                        </div>
                        <div class="card-block">
                          <div class="container mt-3">
                            <fieldset class="form-group">
                              <label>Tên Sách <span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="name_product" placeholder="Mời bạn nhập tên sách" name="name_product">
                                <p class="meserr">{{ $errors->first('name_product') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Mô tả <span class="text-red">*</span></label>
                              <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                              <p class="meserr">{{ $errors->first('description') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Số lượng <span class="text-red">*</span></label>
                              <input type="number" name="quantity" class="form-control">
                              <p class="meserr">{{ $errors->first('quantity') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Giá  <span class="text-red">*</span></label>
                              <input type="number" name="price" class="form-control">
                              <p class="meserr">{{ $errors->first('price') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label for="formGroupExampleInput">Thuộc loại</label>
                              <select class="form-control" name="category_id">
                              @foreach ($categories as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                              </select>
                            </fieldset>
                          </div>
                        </div>
                      <!-- .card-block -->
                      </div>
                      <!-- .card -->
                      <!-- End Default Elements -->
                     <!--  Inline Form -->
                      <div class="card">
                       <div class="card-header">
                         <h4>Tạo hình ảnh </h4>
                       </div>
                       <div class="card-block card-block-full">
                         <div class="container mt-3">
                           <fieldset class="form-group">
                           <label>Tên hình ảnh <span class="text-red">*</span></label>
                           <input type="text" class="form-control" id="name_image" placeholder="Mời bạn nhập tên hình" name="name_image">
                           <p class="meserr">{{ $errors->first('name_image')}}</p>
                           </fieldset>
                           <fieldset class="form-group">
                           <label for="image">Hình ảnh sách</label>
                           <input type="file" name="images[]" multiple class="form-control" style="height: 45px">
                           <p class="meserr">{{ $errors->first('images')}}</p>
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
                          <h4>Chi tiết sách</h4>
                        </div>
                        <div class="card-block">
                        <div class="container mt-3">
                            <fieldset class="form-group">
                              <label>Tác giả <span class="text-red">*</span></label>
                              <input type="text" class="form-control" id="author" placeholder="Mời bạn nhập tên tác giả" name="author">
                              <p class="meserr">{{ $errors->first('author') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Nhà xuất bản <span class="text-red">*</span></label>
                              <input type="text" class="form-control" id="publisher" placeholder="Mời bạn nhập Nhà xuất bản" name="publisher">
                              <p class="meserr">{{ $errors->first('publisher') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Năm xuất bản <span class="text-red">*</span></label>
                              <input type="year" name="publish_year" class="form-control">
                              <p class="meserr">{{ $errors->first('publish_year') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Trọng lượng<span class="text-red">*</span></label>
                              <input type="number" name="weight" class="form-control">
                              <p class="meserr">{{ $errors->first('weight') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Khổ giấy<span class="text-red">*</span></label>
                              <input type="text" name="size" class="form-control" placeholder="VD: 850x45">
                              <p class="meserr">{{ $errors->first('size') }}</p>
                            </fieldset>
                            <fieldset class="form-group">           
                              <label>Số trang<span class="text-red">*</span></label>
                              <input type="number" name="number_of_page" class="form-control">
                              <p class="meserr">{{ $errors->first('number_of_page') }}</p>
                            </fieldset>
                            <fieldset class="form-group">
                              <label>Chất liệu<span class="text-red">*</span></label>
                              <input type="text" name="cover" class="form-control">
                              <p class="meserr">{{ $errors->first('cover') }}</p>
                            </fieldset>
                        </div>
                      </div>
                    </div>
                <!-- End Normal Form -->
              </div>
            <button style="margin-left: 270px" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>  
</main>

@endsection

@section('javascript')

<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/core/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/js/core/jquery.scrollLock.min.js') }}"></script>
<script src="{{ asset('admin/js/core/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('admin/js/app.js') }}"></script>
<script src="{{ asset('admin/js/app-custom.js') }}"></script>

<!-- Page Plugins -->
<script src="{{ asset('admin/js/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.stack.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.min.js') }}"></script>

@endsection
