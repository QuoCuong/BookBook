@extends('admin.layouts.master')

@section('function')
	@include('layouts.partials.functions.order')
@endsection

@section('breadcrumb')
	Đơn hàng / Cập nhật
@endsection

@section('content')

<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div style="margin-bottom: 20px;">
    		<a href="{{ url()->previous() }}" class="btn btn-app"><i class="ion-ios-arrow-back"></i> Quay lại</a>
    	</div>
		<div class="card">
            <div class="card-header">
                <h4>Đơn hàng</h4>
            </div>
            <div class="card-block">
                <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-xs-1">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $order->id }}">
                                <label for="material-disabled">ID</label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $order->user->last_name . ' ' . $order->user->first_name }}">
                                <label for="material-disabled">Khách hàng</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $order->address->address }}">
                                <label for="material-disabled">Địa chỉ</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ date_format($order->created_at, 'd/m/Y') }}">
                                <label for="material-disabled">Ngày</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ number_format($order->total) }}đ">
                                <label for="material-disabled">Tổng tiền</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .card-block -->
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Chi tiết đơn hàng</h4>
            </div>
            @foreach ($order->orderDetails as $orderDetail)
            <div class="card-block">
                <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-xs-1">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $orderDetail->id }}">
                                <label for="material-disabled">ID</label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $orderDetail->product->name }}">
                                <label for="material-disabled">Sản phẩm</label>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-material">
                                <input class="form-control" type="number" id="material-quantity" name="quantity" value="{{ $orderDetail->quantity }}">
                                <label for="material-quantity">Số lượng</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ number_format($orderDetail->product->price) }}đ">
                                <label for="material-disabled">Đơn giá</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ number_format($order->total) }}đ">
                                <label for="material-disabled">Thành tiền</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- .card-block -->
            @endforeach
        </div>
	</div>
</main>
<!-- End Page Content -->
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
