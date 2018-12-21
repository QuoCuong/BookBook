@extends('admin.layouts.master')

@section('content')
<main class="app-layout-content">
	<div  class="container-fluid p-y-md">
		<ul style="list-style: none;" class="navbar-nav mr-auto">
                        <li><a href="{{route('admin.image.index')}}"> Image</a></li> 
                        <li>&nbsp;&nbsp;&nbsp; </li>
                        <li><a href="{{ route('admin.image.create')}}"> New Image </a></li>           
        </ul>

        

	</div>

		<div  class="container-fluid p-y-md">
      
            <div class="container">

            <div class="card">
                <div class="card-header">Edit Image</div>
              
              <div class="card-body">
                    <form action="{{route('admin.image.update', ['id' => $image->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="container mt-3">
                        <fieldset class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" value="{{$image->name}}" name="name">
                        </fieldset>
                        <fieldset class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="path" class="form-control">
                        </fieldset>
                        
                        <fieldset class="form-group">
                            
                            <input type="hidden" class="form-control" id="product_id" value="{{$image->product_id}}" name="product_id">
                        </fieldset>
</div>
                        <div class="form-group">
                              <button class="form-control btn btn-success">Save image</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>

</div>


</main>




@endsection