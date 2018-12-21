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
		<ul style="list-style: none;" class="navbar-nav mr-auto">
      <li><a href="{{ route('admin.image.index')}}"> Image </a></li> 
                 
    </ul>



  </div>

  <div class="container-fluid p-y-md">
    <div class="container">

      <div class="card">
        <div class="card-header">New Image</div>
        <div class="card-body">
          <form action="{{route('admin.image.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container mt-3">
              <fieldset class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" placeholder="Mời bạn nhập tên" name="name">
                <p class="meserr">{{ $errors->first('name')}}</p>
              </fieldset>
              <fieldset class="form-group">
                <label for="image">Image</label>
                <input type="file" name="path" class="form-control">
                <p class="meserr">{{ $errors->first('path')}}</p>
              </fieldset>
              <fieldset class="form-group">
                <label for="formGroupExampleInput">Product_id</label>
                <select class="form-control" name="product_id">
                  @foreach ($products as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </fieldset>

            </div>

            <div class="form-group">
              <button class="form-control btn btn-success">Save Image</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>


</main>




@endsection