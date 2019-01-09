@extends('layouts.app')

@section('oth-page')
    oth-page
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">@lang('labels.cart')</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">@lang('labels.cart')</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- cart-main-area start -->
    <div class="cart-main-area section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                    <form action="#">
                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                    <tr class="title-top">
                                        <th class="product-thumbnail">@lang('labels.image')</th>
                                        <th class="product-name">@lang('labels.product')</th>
                                        <th class="product-price">@lang('labels.price')</th>
                                        <th class="product-quantity">@lang('labels.quantity')</th>
                                        <th class="product-subtotal">@lang('labels.subtotal')</th>
                                        <th class="product-remove">@lang('labels.remove')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li><a href="{{ route('home') }}">@lang('labels.continue_shopping')</a></li>
                            <li><a href="#" class="delete-cart">@lang('labels.remove_cart')</a></li>
                            <!-- <li><a href="#">@lang('labels.update_cart')</a></li> -->
                            <li><a href="{{ route('cart.show_checkout_form') }}">@lang('labels.checkout')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        
                        <div class="cart__total__amount">
                            <span>@lang('labels.cart_subtotal')</span>
                            <span class="cart_total"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection

@section('javascript')

    <script src="{{ asset('js/cart.js') }}"></script>

@endsection