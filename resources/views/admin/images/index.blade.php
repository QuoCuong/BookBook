@extends('admin.layouts.master')

@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">
  <a href="{{ route('admin.products.index') }}"><i class="ion-ios-calculator-outline"></i>Tất cả sách</a>
  <a href="{{route('admin.image.index')}}"><i class="ion-ios-calculator-outline"></i>Hình ảnh sách</a>
  <a href="{{route('admin.productdetail.index')}}"><i class="ion-ios-calculator-outline"></i>Chi tiết sách</a>
</li>
@endsection

@section('content')
<main class="app-layout-content">
	<div  class="container-fluid p-y-md">  
        <h2 class="section-title">Quản lý hình ảnh || <a href="{{ route('admin.image.create')}}"> tạo mới hình ảnh sách </a></h2>
        <div class="row">
          <div class="col-md-12">
          <!-- Card Tabs Default Style -->
            <div class="card">
              <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active">
                <a href="#btabs-static-home">Hình ảnh sách</a>
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
                Path
              </th>
              <th>
                Product_id
              </th>
              <th style="width: 140px;">
               Action
             </th>
             
           </thead>
           <tbody>
            @foreach($images as $image)
            <tr>
              <td>{{ $image->name }}</td>
              <td style="text-align:justify">{{ $image->path }}</td>
              <td style="text-align: center;">{{ $image->product_id }}</td>
              
              <td>
                <a href="{{ route('admin.image.edit', ['id' => $image->id])}}" class="btn btn-xs btn-default"><i class="ion-edit"></i>
                </a>
             
                <form method="POST" action="{{ route('admin.image.destroy',['id' => $image->id])}}" style="display: inline;">

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
    </div>
    

  </div>

</div>
<div  class="container-fluid p-y-md">
  <div style="padding-left: 400px;" class="col-lg-12">
    {{$images->links()}}
  </div>
</div>
 </div>

</main>




@endsection