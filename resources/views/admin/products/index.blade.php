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
  <!-- Header search form -->
  <form class="navbar-form navbar-left app-search-form" role="search" method="get" action="{{route('admin.product.search')}}">
      <div class="form-group">
          <div class="input-group">
              <input class="form-control" type="search" id="search-input" name="key" placeholder="Tìm kiếm..." />
              <span class="input-group-btn">
<button class="btn" type="submit"><i class="ion-ios-search-strong"></i></button>
</span>
          </div>
      </div>
  </form>
  <div class="container-fluid p-y-md">
<br>
<br>
    <!-- Card Tabs -->
    <h2 class="section-title">Quản lý sách || <a href="{{ route('admin.product.create')}}"> Tạo mới sách </a></h2>
    <div class="row">
      <div class="col-md-12">
      <!-- Card Tabs Default Style -->
        <div class="card">
          <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
              <a href="#btabs-static-home">Tất cả sách</a>
            </li>
          </ul>
            <div class="card-block tab-content">
              <div class="tab-pane active" id="btabs-static-home">
               <div class="card-body">
        <table class="table table-header-bg">
          <thead>
            <th>
              Name
            </th>

            <th>
              Description
            </th>
            <th>
              Quantity
            </th>
            <th>
              Price
            </th>
            <th>
              Category_ID
            </th>
            <th style="width: 100px;">
             Action
           </th>


         </thead>
         <tbody> 
          @foreach($products as $product)
          <tr>
            <td style="text-align: center;"><a href="{{ route('admin.product.detail', $product['id']) }}">{{ $product->name }}</a></td>
            <td style="text-align:justify">{{ $product->description }}</td>
            <td style="text-align: center;">{{ $product->quantity }}</td>
            <td style="text-align: center;">{{ $product->price }}</td>
            <td style="text-align: center;">{{ $product->category_id }}</td>
            <td>
              <a href="{{ route('admin.products.edit',  $product->id ) }}" class="btn btn-xs btn-default"><i class="ion-edit"></i>
              </a>
           
              <form method="POST" action="{{ route('admin.product.destroy', ['id' => $product->id ])}}" style="display: inline;" >
                @csrf
                @method('DELETE')
                <button class="btn btn-xs btn-default"><i class="ion-close"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div  class="container-fluid p-y-md">
              <div style="padding-left: 400px;" class="col-lg-12">
                  {{$products->links()}}
              </div>
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
