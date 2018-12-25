@extends('admin.layouts.master')

@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">

</li>
@endsection

@section('breadcrumb')
	Đơn hàng
@endsection

@section('content')

<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div class="card">
    		<div class="card-header">
                <h4>Đơn hàng</h4>
            </div>
            <div class="card-block">
            	<div class="table-responsive">
            		<table class="js-table-sections table table-bordered table-striped table-header-bg table-vcenter">
			        	<thead>
			        		<tr>
			        			
			        			<th>ID</th>
			        			<th>Date</th>
			        			<th>Total</th>
			        			<th>Status</th>
			        		</tr>
			        	</thead>
			        	
				        	<tbody class="js-table-sections-header">
				        		@foreach ($orders as $order)
				        		<tr>
				        			
				        			<td class="text-center">{{ $order->id }}</td>
				        			<td class="text-center">{{ $order->date }}</td>
				        			<td class="text-center">{{ $order->total }}</td>
				        			<td class="text-center">{{ $order->status }}</td>
				        		
				        		</tr>
				        		@endforeach
				        	</tbody>
				        	

            	</div>
            </div>
    	</div>
    </div>
    <!-- End Page Content -->

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

@endsection
