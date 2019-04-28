@extends('layouts.app')

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
                        <h2 class="bradcaump-title">@lang('labels.search')</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">@lang('labels.search')</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">Danh mục sản phẩm</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    @foreach ($category->child as $subcategory)
                                        @foreach ($subcategory->child->random(2) as $child)
                                            <li><a href="{{ route('categories.list_products_by_id', $child->id) }}">{{ $child->name }} <span>({{ $child->products->count() }})</span></a></li>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories pro--range">
                            <h3 class="wedget__title">Lọc theo giá</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Giá: </span><input type="text" name="filter_price" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <input type="hidden" name="order_by" value="{{ $order_by }}">
                                                    <input type="hidden" name="q" value="{{ $q }}">
                                                    <button href="#">Lọc</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                        <aside class="wedget__categories sidebar--banner">
                            <img src="{{ asset('images/others/banner_left.jpg') }}" alt="banner images">
                            <div class="text">
                                <h2>new products</h2>
                                <h6>save up to <br> <strong>40%</strong>off</h6>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    @if (!empty($q))
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="wedget__title">Kết quả tìm kiếm với: {{ $q }}</h3>
                            </div>
                        </div>
                    @elseif (!empty($current_category))
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="wedget__title">{{ $current_category->name }}</h3>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
                                </div>
                                @if ($number_of_products == 0)
                                    <p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm</p>
                                @else
                                    <p>Hiển thị 1–12 trên {{ $number_of_products }} kết quả</p>
                                @endif
                                <div class="orderby__wrapper">
                                    <span>Sắp xếp theo</span>
                                    <select class="shot__byselect" onchange="window.location = this.value">
                                        @if ($filter_prices)
                                            @switch($order_by)
                                                @case('highlight')
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=highlight" selected>Nổi bật</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_desc">Giá cao nhất</option>
                                                    @break
                                                @case('price_asc')
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_asc" selected>Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_desc">Giá cao nhất</option>
                                                    @break
                                                @case('price_desc')
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_desc" selected>Giá cao nhất</option>
                                                    @break
                                                @default
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&filter_price={{ $filter_prices[0] . '-' . $filter_prices[1] }}&order_by=price_desc">Giá cao nhất</option>
                                            @endswitch
                                        @else
                                            @switch($order_by)
                                                @case('highlight')
                                                    <option value="?q={{ $q }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&order_by=highlight" selected>Nổi bật</option>
                                                    <option value="?q={{ $q }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&order_by=price_desc">Giá cao nhất</option>
                                                    @break
                                                @case('price_asc')
                                                    <option value="?q={{ $q }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&order_by=price_asc" selected>Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&order_by=price_desc">Giá cao nhất</option>
                                                    @break
                                                @case('price_desc')
                                                    <option value="?q={{ $q }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&order_by=price_desc" selected>Giá cao nhất</option>
                                                    @break
                                                @default
                                                    <option value="?q={{ $q }}&order_by=newest">Mới nhất</option>
                                                    <option value="?q={{ $q }}&order_by=highlight">Nổi bật</option>
                                                    <option value="?q={{ $q }}&order_by=price_asc">Giá thấp nhất</option>
                                                    <option value="?q={{ $q }}&order_by=price_desc">Giá cao nhất</option>
                                            @endswitch
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                @if ($number_of_products != 0)
                                    @foreach ($products as $product)
                                        <!-- Start Single Product -->
                                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product__thumb">
                                                <a class="first__img" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[0]->path }}" alt="product image"></a>
                                                <a class="second__img animation1" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[1]->path }}" alt="product image"></a>
                                                {{-- <div class="hot__box">
                                                    <span class="hot-label">BEST SALLER</span>
                                                </div> --}}
                                            </div>
                                            <div class="product__content content--center">
                                                <h4><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
                                                <ul class="prize d-flex">
                                                    <li>{{ number_format($product->price) }}đ</li>
                                                    {{-- <li class="old_prize">$35.00</li> --}}
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart add-to-cart" title="Thêm vào giỏ" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1" data-price="{{ $product->price }}" data-image="{{ $product->images[0]->path }}" href="#"><i class="bi bi-shopping-bag4"></i></a></li>
                                                            <li><a class="wishlist" title="Xem giỏ hàng" href="{{ route('cart.index') }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                            <li><a data-toggle="modal" title="Xem nhanh" class="quickview modal-view detail-link" href="#{{ strtolower(remove_special_characters($product->name)) }}"><i class="bi bi-search"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__hover--content">
                                                    <ul class="rating d-flex">
                                                        @php ($max_star = 5)
                                                        @for ($i = 0; $i < $product->comments->avg('averageRating'); $i++)
                                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                                            @php ($max_star -= 1)
                                                        @endfor
                                                        @for ($i = 0; $i < $max_star; $i++)
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                            <div class="list__view__wrapper">
                                @php($first = true)
                                @foreach ($products as $product)
                                    <!-- Start Single Product -->
                                    @if ($first)
                                        <div class="list__view">
                                        @php($first = false)
                                    @else
                                        <div class="list__view mt--40">
                                    @endif
                                        <div class="thumb">
                                            <a class="first__img" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[0]->path }}" alt="product images"></a>
                                            <a class="second__img animation1" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[1]->path }}" alt="product images"></a>
                                        </div>
                                        <div class="content">
                                            <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
                                            <ul class="rating d-flex">
                                                @php ($max_star = 5)
                                                @for ($i = 0; $i < $product->comments->avg('averageRating'); $i++)
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    @php ($max_star -= 1)
                                                @endfor
                                                @for ($i = 0; $i < $max_star; $i++)
                                                    <li><i class="fa fa-star-o"></i></li>
                                                @endfor
                                            </ul>
                                            <ul class="prize__box">
                                                <li>{{ number_format($product->price) }}đ</li>
                                                {{-- <li class="old__prize">$220.00</li> --}}
                                            </ul>
                                            <p>{{ $product->description }}</p>
                                            <ul class="cart__action d-flex">
                                                <li class="cart"><a class="cart add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1" data-price="{{ $product->price }}" data-image="{{ $product->images[0]->path }}" href="#">@lang('labels.add_to_cart')</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {{ $products->appends(\Request::all())->render('paginator.shop') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection

@section('quickview-product')
    @foreach ($products as $product)
    <div class="modal fade" id="{{ strtolower(remove_special_characters($product->name)) }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header modal__header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="big images" src="{{ $product->images[0]->path }}" style="width: 420px; height: 614px;">
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>{{ $product->name }}</h1>
                            <div class="rating__and__review">
                                @if ($product->comments_count != 0)
                                    <ul class="rating">
                                        @php ($max_star = 5)
                                        @for ($i = 0; $i < $product->comments->avg('averageRating'); $i++)
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            @php ($max_star -= 1)
                                        @endfor
                                        @for ($i = 0; $i < $max_star; $i++)
                                            <li><i class="fa fa-star-o"></i></li>
                                        @endfor
                                    </ul>
                                    <div class="review">
                                        <a href="#">( {{ $product->comments_count }} đánh giá từ khách hàng )</a>
                                    </div>
                                @endif
                            </div>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">{{ number_format($product->price) }}đ</span>
                                    <!-- <span class="old-price">$45.00</span> -->
                                </div>
                            </div>
                            <div class="quick-desc">
                                {{ $product->description }}
                            </div>
                            <div class="addtocart-btn">
                                <a class="cart add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1" data-price="{{ $product->price }}" data-image="{{ $product->images[0]->path }}" href="#">@lang('labels.add_to_cart')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
