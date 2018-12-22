@extends('admin.layouts.master')

@section('function')
<li class="nav-item nav-drawer-header">Chức năng</li>

<li class="nav-item nav-item-has-subnav">
    <!-- <a href=""><i class="ion-ios-search"></i>Tìm kiếm</a> -->
    <!-- <ul class="nav nav-subnav">
        <li>
            <a href="base_ui_buttons.html">Buttons</a>
        </li>
        <li>
            <a href="base_ui_cards.html">Cards</a>
        </li>
    </ul> -->
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
			        			<th style="width: 30px;"></th>
			        			<th>ID</th>
			        			<th>Địa chỉ</th>
			        			<th>Khách hàng</th>
			        			<th>Ngày</th>
			        			<th>Tổng tiền</th>
			        			<th></th>
			        		</tr>
			        	</thead>
			        	@foreach ($orders as $order)
				        	<tbody class="js-table-sections-header">
				        		<tr>
				        			<td class="text-center">
				        				<i class="caret"></i>
				        			</td>
				        			<td class="text-center">{{ $order->id }}</td>
				        			<td>{{ $order->address->address }}</td>
				        			<td>{{ $order->user->first_name }}</td>
				        			<td class="text-center">{{ date_format($order->created_at, 'd/m/Y') }}</td>
				        			<td class="text-right">{{ number_format($order->total) }}đ</td>
				        			<td class="text-center">
                                        <div class="btn-group">
                                        	<a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="" data-original-title="Chi tiết"><i class="ion-eye"></i></a>
                                            <form method="POST" action="{{ route('admin.orders.delete', $order->id) }}" style="display: inline;">
                                            	@method('DELETE')
                                            	@csrf
                                            	<button class="btn btn-xs btn-default" data-toggle="tooltip" title="" data-original-title="Hủy"><i class="ion-close"></i></button>
                                            </form>
                                        </div>
                                    </td>
				        		</tr>
				        	</tbody>
				        	<tbody>
				        		<tr>
					    			<th class="text-center"></th>
					    			<th>ID</th>
					    			<th>Sản phẩm</th>
					    			<th>Số lượng</th>
					    			<th>Đơn giá</th>
					    			<th>Thành tiền</th>
					    			<th></th>
					    		</tr>
					    		@foreach ($order->orderDetails as $orderDetail)
					        		<tr>
						    			<td class="text-center"></td>
						    			<td class="text-center">{{ $orderDetail->id }}</td>
						    			<td>{{ $orderDetail->product->name }}</td>
						    			<td class="text-right">{{ $orderDetail->quantity }}</td>
						    			<td class="text-right">{{ number_format($orderDetail->product->price) }}đ</td>
						    			<td class="text-right">{{ number_format($orderDetail->quantity * $orderDetail->product->price) }}đ</td>
						    			<td class="text-center"></td>
						    		</tr>
					        	@endforeach
				        	</tbody>
			        	@endforeach
			        </table>
			        <div class="text-center">
			        	{{ $orders->links() }}
			        </div>
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

<!-- Page JS Code -->
<script>
    $(function()
    {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });

    $(document).ready(function () {
    	$("table a, table button").on("click", function () {
    		$("table tr").unbind("click");
    	});
    });
</script>

@endsection
