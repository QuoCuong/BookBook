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
	Đơn hàng / Chi tiết đơn hàng
@endsection

@section('content')

<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
    	<div style="margin-bottom: 20px;">
            @if ($order->status == 'pending')
                <a href="{{ route('admin.orders.pending') }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Đang chờ xử lý</a>
                <form method="POST" action="{{ route('admin.orders.update.status', [$order->id, 'cancelled']) }}" style="display: inline;">
                    @csrf
                    <button class="btn btn-app-red pull-right">Hủy đơn</button>
                </form>
            @elseif ($order->status == 'approved')
                <a href="{{ route('admin.orders.approved') }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Đã duyệt</a>
                <form method="POST" action="{{ route('admin.orders.update.status', [$order->id, 'cancelled']) }}" style="display: inline;">
                    @csrf
                    <button class="btn btn-app-red pull-right">Hủy đơn</button>
                </form>
            @elseif ($order->status == 'complete')
                <a href="{{ route('admin.orders.complete') }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Hoàn tất</a>
            @else
                <a href="{{ route('admin.orders.cancelled') }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Đã hủy</a>
            @endif
    	</div>
        <div class="progress active">
            @if ($order->status == 'pending')
                <div class="progress-bar progress-bar-orange progress-bar-striped" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">Đang chờ xử lý</div>
            @elseif ($order->status == 'approved')
                <div class="progress-bar progress-bar-cyan progress-bar-striped" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">Đã duyệt</div>
            @elseif ($order->status == 'complete')
                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Hoàn tất</div>
            @else
                <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Đã hủy</div>
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="card">
            <div class="card-header">
                <h4>#{{ $order->id }}</h4>
<!--                 <ul class="card-actions">
                    <li>
                        
                    </li>
                </ul> -->
            </div>
            <div class="card-block">
                <!-- Invoice Info -->
                <div class="h1 text-uppercase text-center m-t m-b-md hidden-print">Chi tiết đơn hàng</div>
                <hr class="hidden-print">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-xs-6 col-sm-4 col-lg-3">
                        <p class="h3">Khách hàng</p>
                        <address>
                            {{ $user->last_name . ' ' . $user->firt_name }}<br>
                            <i class="ion-email"></i> {{ $user->email }}<br>
                            <i class="ion-calendar"></i> {{ convert_to_my_date_format($user->birthday) }}<br>
                            @if ($user->sex == 'male')
                                <i class="ion-transgender"></i> Nam
                            @else
                                <i class="ion-transgender"></i> Nữ
                            @endif
                        </address>
                    </div>
                    <!-- End Company Info -->

                    <!-- Client Info -->
                    <div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 text-right">
                        <p class="h3">Địa chỉ</p>
                        <address>
                            {{ $address->last_name . ' ' . $address->first_name }}<br>
                            {{ $address->city->name . ' / ' . $address->district->name }}<br>
                            {{ $address->address }}<br>
                            <i class="ion-ios-telephone-outline"></i> {{ $address->phone }}
                        </address>
                    </div>
                    <!-- End Client Info -->
                </div>
                <!-- End Invoice Info -->

                <!-- Table -->
                <div class="table-responsive m-y-lg">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Sản phẩm</th>
                                <th class="text-center" style="width: 100px;">Số lượng</th>
                                <th class="text-right w-10">Đơn giá</th>
                                <th class="text-right w-10">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetail)
                                <tr>
                                    <td class="text-center">{{ $orderDetail->id }}</td>
                                    <td>{{ $orderDetail->product->name }}</td>
                                    <td class="text-center">{{ $orderDetail->quantity }}</td>
                                    <td class="text-right">{{ number_format($orderDetail->product->price) }}đ</td>
                                    <td class="text-right">{{ number_format($orderDetail->product->price * $orderDetail->quantity) }}đ</td>
                                </tr>
                            @endforeach
                            <tr class="active">
                                <td colspan="4" class="font-500 text-uppercase text-right">Tổng tiền</td>
                                <td class="font-500 text-right">{{ number_format($order->total) }}đ</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        @if ($order->status == 'pending')
                            <form method="POST" action="{{ route('admin.orders.update.status', [$order->id, 'approved']) }}">
                                @csrf
                                <button class="btn btn-app-cyan">Duyệt đơn</button>
                            </form>
                        @elseif ($order->status == 'approved')
                            <form method="POST" action="{{ route('admin.orders.update.status', [$order->id, 'complete']) }}">
                                @csrf
                                <button class="btn btn-app-green">Hoàn tất</button>
                            </form>
                        @endif
                    </div>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <!-- <hr class="hidden-print">
                <p class="text-muted text-center"><small>Thank you very much for doing business with us. We will happy to work with you again!</small></p> -->
                <!-- End Footer -->
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
    <script src="{{ asset('admin/js/pages/base_ui_progress.js') }}"></script>

@endsection
