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
	Quản lý đơn hàng / Xem chi tiết
@endsection

@section('content')

<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div style="margin-bottom: 20px;">
    		<a href="{{ url()->previous() }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Quay lại</a>
    	</div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-green bg-inverse">
                        <h4>Đơn hàng</h4>
                    </div>
                    <div class="card-block">
                        <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $order->id }}">
                                        <label for="material-disabled">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ date_format($order->created_at, 'd/m/Y') }}">
                                        <label for="material-disabled">Ngày</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
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
                    <div class="card-header bg-green bg-inverse">
                        <h4>Khách hàng</h4>
                    </div>
                    <div class="card-block">
                        <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $user->id }}">
                                        <label for="material-disabled">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $user->email }}">
                                        <label for="material-disabled">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $user->last_name }}">
                                        <label for="material-disabled">Họ</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $user->first_name }}">
                                        <label for="material-disabled">Tên</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $user->birthday }}">
                                        <label for="material-disabled">Ngày sinh</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        @if ($user->sex == 'male')
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="Nam">
                                        @else
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="Nữ">
                                        @endif
                                        <label for="material-disabled">Giới tính</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- .card-block -->
                </div>
                <div class="card">
                    <div class="card-header bg-green bg-inverse">
                        <h4>Địa chỉ</h4>
                    </div>
                    <div class="card-block">
                        <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->id }}">
                                        <label for="material-disabled">ID</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->last_name }}">
                                        <label for="material-disabled">Họ</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->first_name }}">
                                        <label for="material-disabled">Tên</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->phone }}">
                                        <label for="material-disabled">Số điện thoại</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->city->name }}">
                                        <label for="material-disabled">Thành phố</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->district->name }}">
                                        <label for="material-disabled">Tỉnh / Quận / Huyện</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $address->address }}">
                                        <label for="material-disabled">Địa chỉ</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- .card-block -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-cyan bg-inverse">
                        <h4>Chi tiết đơn hàng</h4>
                    </div>
                    <div class="card-block">
                        <form class="form-horizontal m-t-sm" action="base_forms_elements_modern.html" method="post" onsubmit="return false;">
                            @foreach ($order->orderDetails as $orderDetail)
                            <div class="form-group">
                                <div class="col-md-1 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $orderDetail->id }}">
                                        <label for="material-disabled">ID</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ $orderDetail->product->name }}">
                                        <label for="material-disabled">Sản phẩm</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="number" id="material-quantity" name="quantity" disabled value="{{ $orderDetail->quantity }}">
                                        <label for="material-quantity">Số lượng</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ number_format($orderDetail->product->price) }}đ">
                                        <label for="material-disabled">Đơn giá</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="material-disabled" name="material-disabled" disabled value="{{ number_format($order->total) }}đ">
                                        <label for="material-disabled">Thành tiền</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">
                                    <div>
                                        <a href="{{ route('admin.order_details.edit', $orderDetail->id) }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa"><i class="ion-edit"></i></a>
                                        <a href="{{ route('admin.order_details.delete', $orderDetail->id) }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="" data-original-title="Xóa"><i class="ion-close"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </form>
                    </div>
                    <!-- .card-block -->
                </div>
            </div>
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
