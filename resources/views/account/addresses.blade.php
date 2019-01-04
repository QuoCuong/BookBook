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
                            <span class="breadcrumb_item active">Địa chỉ </span>
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
                        <div class="accountAddress">
                            <h3> Sổ địa chỉ nhận hàng: </h3>
                            <div class="address row">
                                <div class="col-sm-6 co-xs-12 address_defaul">
                                    <div class="main">
                                        <div class="address_table">
                                            <div class="view_address_1021190647">
                                                <div class="view_address">
                                                    @foreach ($addresses as $address )
                                                    <p class="name">{{$address->first_name.' '.$address->last_name}}</p>
                                                    <p class="address"> Quận/Huyện : {{$address->district->name}}</p>
                                                    <p class="address"> Tỉnh/Thành phố: {{$address->city->name}}</p>
                                                    <p class="address"> Địa chỉ cụ thể: {{$address->address}}</p>  
                                                    <p class="phone"> Số điện thoại: {{$address->phone}}</p>
                                                    <p class="address_actions">
                                                    <span class="action_link action_edit"><a href="{{route('address.edit', ['id' => $address->id ])}}">Sửa</a></span>
                                                        <span class="action_link action_delete"><a href="">Xóa</a></span>
                                                    </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- End Bradcaump area -->
    <!-- Start Shop Page -->