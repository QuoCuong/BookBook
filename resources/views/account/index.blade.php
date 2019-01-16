@extends('layouts.app')
{{-- {{ dump($page) }} --}}
@section('oth-page')
    oth-page
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cửa hàng</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Thông tin</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="accountSidebar bg_w" style="margin-top:10px;">
                    <div class="feature_user">
                        <div class="icon">
                            <img src="{{ asset('admin/img/avatars/icon_avatar.png') }}" alt="Nguyen Hung">
                        </div>
                        <div class="user">
                            <span>Tài khoản của:</span>
                        <h3> {{$user->first_name.' '.$user->last_name}}</h3>
                        </div>
                    </div>
                    <div class="link_account">
                        <ul>
                            <li class="active"><a href="{{route('account.index')}}">Thông tin chung</a></li>
                            <li class="active"><a href="{{route('account.addresses')}}">Sổ địa chỉ</a></li>
                        </ul>
                    </div>

                </div>
                <div class="ctAccount">
                    <div class="detailAccount bg_w">
                        <div class="accountInfo relative">
                            <h3>Bảng thông tin của tôi</h3>
                            <div class="user_info">
                                <h3>Thông tin tài khoản</h3>
                                <div class="main">
                                    <ul>
                                        <li>
                                            <span class="first">Họ và tên:</span>
                                            <span class="last">{{$user->first_name.' '.$user->last_name}}</span>
                                        </li>
                                        <li>
                                            <span class="first">Email: </span>
                                            <span class="last">{{$user->email}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accountNewoder">
                            <div class="fancy-title title-bottom-border">
                                <h3 style="font-size: 16px;
                                margin-bottom: 10px;
                                color: #333;">Các đơn hàng bạn đã đặt</h3>
                            </div>
                            <div class="table-responsive account-table">
                                    <table class="js-table-sections table table-bordered table-striped table-header-bg table-vcenter">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="text-center">Ngày đặt hàng</th>
                                                    <th class="text-center">Tổng tiền</th>
                                                    <th class="text-center">Trạng thái</th>
                                                </tr>
                                            </thead>
                                            
                                                <tbody class="js-table-sections-header">
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td class="text-center">{{ $order->date }}</td>
                                                        <td class="text-center">{{ number_format($order->total) }} đ</td>
                                                        @if($order->status == 'approved')
                                                        <td class="text-center"><span class="text-success">{{ $order->status }} </span></td>
                                                        @elseif($order->status == 'cancelled')
                                                        <td class="text-center"><span class="text-danger">{{ $order->status }} </span></td>
                                                        @else 
                                                        <td class="text-center"><span class="text-info">{{ $order->status }}  <a href="{{ route('account.order.cannel',['id'=>$order->id])}}" class="btn btn-outline-danger btn-sm">Hủy</a></span></td>
                                                        
		                                                @endif
                                                    
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- End Bradcaump area -->
    <!-- Start Shop Page -->