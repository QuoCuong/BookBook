@extends('layouts.app')

@section('oth-page')
    oth-page
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">@lang('labels.product_details')</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">@lang('labels.product_details')</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start main Content -->
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="wn__single__product">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                        @if (!empty($product->images))
                                            @foreach ($product->images as $image)
                                                <a href="#"><img src="{{ $image->path }}" alt=""></a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="product__info__main">
                                    <h1>{{ $product->name }}</h1>
                                    <div class="product-reviews-summary d-flex">
                                        <ul class="rating-summary d-flex">
                                            @for ($i = 0; $i < $product->comments->avg('averageRating'); $i++)
                                                <li class="on"><i class="zmdi zmdi-star-outline"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span>{{ number_format($product->price) }}đ</span>
                                    </div>
                                    <div class="product__overview">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="box-tocart d-flex">
                                        <span>@lang('labels.quantity')</span>
                                        <input id="qty" class="input-text qty" name="qty" min="1" max="10" value="1" title="Qty" type="number">
                                        <div class="addtocart__actions">
                                            <button class="tocart"  type="submit" title="Add to Cart">@lang('labels.add_to_cart')</button>
                                        </div>
                                    </div>
                                    <div class="product_meta">
                                        <span class="posted_in">@lang('labels.category'):
                                            <a href="{{ route('categories.list_products_by_id', $product->category->id) }}">{{ $product->category->name }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__info__detailed">
                        <div class="pro_details_nav nav justify-content-start" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">@lang('labels.details')</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">@lang('labels.reviews')</a>
                        </div>
                        <div class="tab__container">
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                <div class="description__attribute">
                                    <p>{{ $product->description }}</p>
                                    <table class="table table-striped product-details">
                                        <tbody>
                                            <tr>
                                                <td>Mã sản phẩm</td>
                                                <td>{{ $product->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tác giả</td>
                                                <td>{{ $product->productDetail->author }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nhà xuất bản</td>
                                                <td>{{ $product->productDetail->publisher }}</td>
                                            </tr>
                                            <tr>
                                                <td>Năm xuất bản</td>
                                                <td>{{ $product->productDetail->publish_year }}</td>
                                            </tr>
                                            <tr>
                                                <td>Trọng lượng (gr)</td>
                                                <td>{{ $product->productDetail->weight }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kích thước</td>
                                                <td>{{ $product->productDetail->size }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số trang</td>
                                                <td>{{ $product->productDetail->number_of_page }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bìa</td>
                                                <td>{{ $product->productDetail->cover }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                @php ($first = true)
                                @foreach ($comments as $comment)
                                    @if ($first)
                                        <div class="review__attribute">
                                        @php ($first = false)
                                    @else
                                        <hr>
                                        <div class="review__attribute mt--20">
                                    @endif
                                        <h1>{{ $comment->title }}</h1>
                                        <h2>{{ $comment->content }}</h2>
                                        <div class="review__ratings__type d-flex">
                                            <div class="review-ratings">
                                                <div class="rating-summary d-flex">
                                                    <span>@lang('labels.quality')</span>
                                                    <ul class="rating d-flex">
                                                        @for ($i = 0; $i < $comment->rating_quality; $i++)
                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $comment->rating_quality; $i++)
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <div class="rating-summary d-flex">
                                                    <span>@lang('labels.price')</span>
                                                    <ul class="rating d-flex">
                                                        @for ($i = 0; $i < $comment->rating_price; $i++)
                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $comment->rating_price; $i++)
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <div class="rating-summary d-flex">
                                                    <span>@lang('labels.value')</span>
                                                    <ul class="rating d-flex">
                                                        @for ($i = 0; $i < $comment->rating_value; $i++)
                                                            <li><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $comment->rating_value; $i++)
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>@lang('labels.review_by') <i>{{ $comment->nickname }}</i></p>
                                                <p>@lang('labels.posted_on') <i>{{ date_format($comment->created_at, 'd/m/Y') }}</i></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="text-center">
                                    {{ $comments->render('paginator.product_details') }}
                                </div>
                                <div class="review-fieldset">
                                    @guest
                                        <h3>Chỉ có thành viên mới có thể viết nhận xét<br>Vui lòng <a style="text-decoration: underline;" href="{{ route('login') }}"><i>đăng nhập</i></a> hoặc <a style="text-decoration: underline;" href="{{ route('register') }}"><i>đăng ký</i></a>.</h3>
                                    @else
                                        <h2>@lang('labels.reviewing'):</h2>
                                        <h3>{{ $product->name }}</h3>
                                        <form method="POST" action="{{ route('comments.store') }}" id="comment_form">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="review-field-ratings">
                                                <div class="product-review-table">
                                                    <div class="review-field-rating d-flex">
                                                        <span>@lang('labels.quality')</span>
                                                        <ul class="rating d-flex">
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <input type="hidden" name="rating_quality" value="3">
                                                        </ul>
                                                    </div>
                                                    <div class="review-field-rating d-flex">
                                                        <span>@lang('labels.price')</span>
                                                        <ul class="rating d-flex">
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <input type="hidden" name="rating_price" value="3">
                                                        </ul>
                                                    </div>
                                                    <div class="review-field-rating d-flex" id="rating-error">
                                                        <span>@lang('labels.value')</span>
                                                        <ul class="rating d-flex">
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="on"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                            <input type="hidden" name="rating_value" value="3">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_form_field">
                                                <div class="input__box">
                                                    <span>@lang('labels.nickname')</span>
                                                    <input id="nickname_field" type="text" name="nickname">
                                                </div>
                                                <div class="input__box">
                                                    <span>@lang('labels.title')</span>
                                                    <input id="title_field" type="text" name="title">
                                                </div>
                                                <div class="input__box">
                                                    <span>@lang('labels.review')</span>
                                                    <textarea name="content"></textarea>
                                                </div>
                                                <div class="review-form-actions">
                                                    <button>@lang('labels.submit_review')</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endguest
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                        </div>
                    </div>
                    <div class="wn__related__product pt--80 pb--50">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">@lang('labels.related_products')</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                                @foreach ($related_products as $product)
                                    <!-- Start Single Product -->
                                    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[0]->path }}" alt="product image"></a>
                                            <a class="second__img animation1" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[1]->path }}" alt="product image"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">{{ $product->name }}</a></h4>
                                            <ul class="prize d-flex">
                                                <li>{{ number_format($product->price) }}đ</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart add-to-cart" title="Thêm vào giỏ" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-quantity="1" data-price="{{ $product->price }}" data-image="{{ $product->images[0]->path }}" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" title="Xem giỏ hàng" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
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
                                    <!-- Start Single Product -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">Danh mục liên quan</h3>
                            <ul>
                                @foreach ($related_categories as $category)
                                    <li><a href="{{ route('categories.list_products_by_id', $category->id) }}">{{ $category->name }} <span>({{ $category->products_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories pro--range">
                            <h3 class="wedget__title">Lọc theo giá</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="{{ route('categories.index') }}" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Giá: </span><input type="text" name="filter_price" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <button>Lọc</button>
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
            </div>
        </div>
    </div>
    <!-- End main Content -->
@endsection

@section('quickview-product')
	<div id="quickview-wrapper">
        <!-- Modal -->
        @foreach ($related_products as $product)
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
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/comment_form_validation.js') }}"></script>
    <script>
        $(document).ready(function ($) {
            $('.review-field-rating > .rating > li').on('click', function () {
                $(this).attr({
                    class: 'on'
                })
                $(this).prevAll().attr({
                    class: 'on'
                });
                $(this).nextAll().attr({
                    class: 'off'
                });

                number_of_stars = $(this).prevAll().length + 1;
                $(this).parent().children().last().attr({
                    value: number_of_stars
                });
            });
        });
    </script>
@endsection
