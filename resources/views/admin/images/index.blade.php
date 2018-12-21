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
	<div  class="container-fluid p-y-md">

      <div class="card">
        <div class="card-header">Images
        <a href="{{ route('admin.image.create')}}"> New Image </a>
        </div>

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
                <a href="{{ route('admin.image.edit', ['id' => $image->id])}}" class="btn btn-xs btn-success">Edit
                </a>
             
                <form action="{{ route('admin.image.destroy',['id' => $image->id])}}" style="display: inline;">

                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-xs btn-danger">Delete</button>
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