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
                            <span class="breadcrumb_item active">Shop Single</span>
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
                                                    <input type="hidden" name="order_by" value="">
                                                    <input type="hidden" name="page" value="">
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
                        <div class="row">
                                <div class="col-sm-4" style=" margin-top:50px;" >
                                     @include('layouts.imageproduct')
                                </div>
                                <div class="col-sm-8" style="margin-top:50px;">
                                        <div class="product__info__main">
                                                <h1>{{$product->name}}</h1>
                                                <div class="product-reviews-summary d-flex">
                                                    <ul class="rating-summary d-flex">
                                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                                        <li><i class="zmdi zmdi-star-outline"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                                        <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="price-box">
                                                    <span>{{$product->price}}$</span>
                                                </div>
                                                <div class="product__overview">
                                                    <p>{{$product->description}}</p>
                                                    
                                                </div>
                                                <div class="box-tocart d-flex">
                                                    <span>Qty</span>
                                                    <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                                                    <div class="addtocart__actions">
                                                        <button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
                                                    </div>
                                                    <div class="product-addto-links clearfix">
                                                        <a class="wishlist" href="#"></a>
                                                        <a class="compare" href="#"></a>
                                                    </div>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="posted_in">Categories: 
                                                        <a href="#">Adventure</a>, 
                                                        <a href="#">Kids' Music</a>
                                                    </span>
                                                </div>
                                                <div class="product-share">
                                                    <ul>
                                                        <li class="categories-title">Share :</li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="icon-social-twitter icons"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="icon-social-tumblr icons"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="icon-social-facebook icons"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="icon-social-linkedin icons"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
 
                        </div>
                        <div class="row" style="margin-left:20px;">
                                
                                        <div class="product__info__detailed">
                                                <div class="pro_details_nav nav justify-content-start" role="tablist">
                                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
                                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
                                                </div>
                                                <div class="tab__container">
                                                    <!-- Start Single Tab Content -->
                                                    <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                                        <div class="description__attribute">
                                                            <p>{{$product->description}}</p>
                                                            <ul>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <li>• Tác Giả: {{$productDetail->author}}</li>
                                                                        <li>• Nhà xuất bản: {{$productDetail->publisher}}</li>
                                                                        <li>• Năm xuất bản: {{$productDetail->publish_year}}</li>
                                                                        <li>• Trọng lượng: {{$productDetail->weight}}</li>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <li>• Khổ giấy: {{$productDetail->size}}</li>
                                                                        <li>• Tổng số trang: {{$productDetail->number_of_page}}</li>
                                                                        <li>• Chất liệu: {{$productDetail->cover}}</li>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Tab Content -->
                                                    <!-- Start Single Tab Content -->
                                                    <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                                        <div class="review__attribute">
                                                            <h1>Customer Reviews</h1>
                                                            <h2>Hastech</h2>
                                                            <div class="review__ratings__type d-flex">
                                                                <div class="review-ratings">
                                                                    <div class="rating-summary d-flex">
                                                                        <span>Quality</span>
                                                                        <ul class="rating d-flex">
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                    
                                                                    <div class="rating-summary d-flex">
                                                                        <span>Price</span>
                                                                        <ul class="rating d-flex">
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="rating-summary d-flex">
                                                                        <span>value</span>
                                                                        <ul class="rating d-flex">
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="review-content">
                                                                    <p>Hastech</p>
                                                                    <p>Review by Hastech</p>
                                                                    <p>Posted on 11/6/2018</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review-fieldset">
                                                            <h2>You're reviewing:</h2>
                                                            <h3>Chaz Kangeroo Hoodie</h3>
                                                            <div class="review-field-ratings">
                                                                <div class="product-review-table">
                                                                    <div class="review-field-rating d-flex">
                                                                        <span>Quality</span>
                                                                        <ul class="rating d-flex">
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="review-field-rating d-flex">
                                                                        <span>Price</span>
                                                                        <ul class="rating d-flex">
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="review-field-rating d-flex">
                                                                        <span>Value</span>
                                                                        <ul class="rating d-flex">
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review_form_field">
                                                                <div class="input__box">
                                                                    <span>Nickname</span>
                                                                    <input id="nickname_field" type="text" name="nickname">
                                                                </div>
                                                                <div class="input__box">
                                                                    <span>Summary</span>
                                                                    <input id="summery_field" type="text" name="summery">
                                                                </div>
                                                                <div class="input__box">
                                                                    <span>Review</span>
                                                                    <textarea name="review"></textarea>
                                                                </div>
                                                                <div class="review-form-actions">
                                                                    <button>Submit Review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Tab Content -->
                                                </div>
                                            </div>
                                        
                        </div>   
                        </div>
                </div>     
            </div>
               
        </div>
    </div>
    <!-- End Shop Page -->
@endsection

