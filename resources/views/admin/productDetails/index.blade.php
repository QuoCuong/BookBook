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
      <div class="card-header">ProductDetails </div>
      <div class="card-body">
        <table class="table table-header-bg">
          <thead>
            <th>
              Author
            </th>

            <th>
              Publisher
            </th>
            <th>
              Publish_Year
            </th>
            <th>
              Weight
            </th>
            <th>
              Size
            </th>
            <th>
              Number_Of_Page
            </th>
            <th>
              Cover
            </th>
            <th>
              Product_id
            </th>
            <th style="width: 130px;">
             Action
           </th>


         </thead>
         <tbody>
          @foreach($productdetails as $productdetail)
          <tr>
            <td style="text-align: center;">{{ $productdetail->author }}</td>
            <td style="text-align:justify">{{ $productdetail->publisher }}</td>
            <td style="text-align: center;">{{ $productdetail->publish_year }}</td>
            <td style="text-align: center;">{{ $productdetail->weight }}</td>
            <td style="text-align: center;">{{ $productdetail->size }}</td>
            <td style="text-align: center;">{{ $productdetail->number_of_page }}</td>
            <td style="text-align: center;">{{ $productdetail->cover }}</td>
            <td style="text-align: center;">{{ $productdetail->product_id }}</td>
            <td>
              <a href="{{ route('admin.productdetail.edit', ['id' => $productdetail->id ]) }}" class="btn btn-xs btn-success">Edit
              </a>
           
              <form method="POST" action="{{ route('admin.productdetail.destroy', ['id' => $productdetail->id ])}}" style="display: inline;" >
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
      {{$productdetails->links()}}
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
