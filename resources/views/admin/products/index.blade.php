@extends('admin.layouts.master')

@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">
  <a href="{{ route('admin.products.index') }}"><i class="ion-ios-calculator-outline"></i>Products</a>
  <a href="{{route('admin.image.index')}}"><i class="ion-ios-calculator-outline"></i>Image</a>
  <a href="{{route('admin.productdetail.index')}}"><i class="ion-ios-calculator-outline"></i>ProductDetail</a>
</li>
@endsection

@section('content')
<main class="app-layout-content">
  <div  class="container-fluid p-y-md">

    <div class="card">
      <div class="card-header">Products
      <a href="{{ route('admin.product.create')}}"> New Product </a>
      </div>
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
              Subcategory_id
            </th>
            <th style="width: 130px;">
             Action
           </th>


         </thead>
         <tbody>
          @foreach($products as $product)
          <tr>
            <td style="text-align: center;">{{ $product->name }}</td>
            <td style="text-align:justify">{{ $product->description }}</td>
            <td style="text-align: center;">{{ $product->quantity }}</td>
            <td style="text-align: center;">{{ $product->price }}</td>
            <td style="text-align: center;">{{ $product->subcategory_id }}</td>
            <td>
              <a href="{{ route('admin.product.edit', ['id' => $product->id ]) }}" class="btn btn-xs btn-success">Edit
              </a>
           
              <form method="POST" action="{{ route('admin.product.destroy', ['id' => $product->id ])}}" style="display: inline;" >
                @csrf
                @method('DELETE')
                <button class="btn btn-xs btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>





  </div>
  <div  class="container-fluid p-y-md">
    <div style="padding-left: 400px;" class="col-lg-12">
      {{$products->links()}}
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

<!-- Page JS Code -->
<script src="{{ asset('admin/js/pages/index.js') }}"></script>
<script>
  $(function () {
        // Init page helpers (Slick Slider plugin)
        App.initHelpers('slick');
      });

  $(document).ready(function ($) {
    $('.logout').on('click', function () {
      event.preventDefault();
      $('form[name=logout]').submit();
      console.log('working');
    });
  });
</script>

@endsection
