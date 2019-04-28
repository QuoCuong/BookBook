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
    <!-- Card Tabs -->
    <div class="row">
      <div class="col-md-12">
      <!-- Card Tabs Default Style -->
        <div class="card">
          <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
              <a href="#btabs-static-home">Sách tìm kiếm được</a>
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


         </thead>
         <tbody>
          @foreach($product as $new)
          <tr>
            <td style="text-align: center;">{{ $new->name }}</td>
            <td style="text-align:justify">{{ $new->description }}</td>
            <td style="text-align: center;">{{ $new->quantity }}</td>
            <td style="text-align: center;">{{ $new->price }}</td>
            <td style="text-align: center;">{{ $new->category_id }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
