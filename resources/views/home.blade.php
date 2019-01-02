@extends('layouts.app')

@section('content')

	@include('layouts.partials.slider')

	<!-- Start BEst Seller Area -->
	<section class="wn__product__area brown--color pt--80 pb--30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section__title text-center">
						<h2 class="title__be--2">Sách<span class="color--theme"> Mới</span></h2>
					</div>
				</div>
			</div>
			<!-- Start Single Tab Content -->
			<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
				<!-- Start Single Product -->
				@foreach ($new_products as $product)
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="{{ route('products.show', $product->id) }}">
									<img src="{{ $product->images[0]->path }}" alt="product image">
								</a>
								<a class="second__img animation1" href="{{ route('products.show', $product->id) }}">
									<img src="{{ $product->images[1]->path }}" alt="product image">
								</a>
								<!-- <div class="hot__box">
									<span class="hot-label">BEST SALLER</span>
								</div> -->
							</div>
							<div class="product__content content--center">
								<h4><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
								<ul class="prize d-flex">
									<li>{{ number_format($product->price) }}đ</li>
									<!-- <li class="old_prize">$35.00</li> -->
								</ul>
								<div class="action">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><a class="cart" href="#"><i class="bi bi-shopping-bag4"></i></a></li>
											<li><a class="wishlist" href="#"><i class="bi bi-shopping-cart-full"></i></a></li>
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
					</div>
				@endforeach
				<!-- End Single Product -->
				</div>
			</div>
			<!-- End Single Tab Content -->
		</div>
	</section>
	<!-- Start NEwsletter Area -->
	<section class="wn__newsletter__area bg-image--2">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
					<div class="section__title text-center">
						<h2>Nhận bản tin từ chúng tôi</h2>
					</div>
					<div class="newsletter__block text-center">
						<p>Theo dõi bản tin của chúng tôi ngay bây giờ và cập nhật các bộ sưu tập mới, tìm các cuốn sách mới nhất và các ưu đãi độc quyền.</p>
						<form action="#">
							<div class="newsletter__box">
								<input type="email" placeholder="Nhập email của bạn">
								<button>Theo dõi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End NEwsletter Area -->
	<!-- Start Best Seller Area -->
	<section class="wn__bestseller__area bg--white pt--80  pb--30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section__title text-center">
						<h2 class="title__be--2">Sách <span class="color--theme">Nổi bật</span></h2>
					</div>
				</div>
			</div>
			<div class="tab__container mt--60">
				<!-- Start Single Tab Content -->
				<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
					<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
						@foreach ($all_products->chunk(2) as $chunk)
							<div class="single__product">
								@foreach ($chunk as $product)
									<!-- Start Single Product -->
									<div class="col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="product product__style--3">
											<div class="product__thumb">
												<a class="first__img" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[0]->path }}" alt="product image"></a>
												<a class="second__img animation1" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[1]->path }}" alt="product image"></a>
												<!-- <div class="hot__box">
													<span class="hot-label">BEST SALER</span>
												</div> -->
											</div>
											<div class="product__content content--center content--center">
												<h4><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
												<ul class="prize d-flex">
													<li>{{ number_format($product->price) }}đ</li>
													<!-- <li class="old_prize">$35.00</li> -->
												</ul>
												<div class="action">
													<div class="actions_inner">
														<ul class="add_to_links">
															<li><a class="cart" href="#"><i class="bi bi-shopping-bag4"></i></a></li>
															<li><a class="wishlist" href="#"><i class="bi bi-shopping-cart-full"></i></a></li>
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
									</div>
									<!-- End Single Product -->
								@endforeach
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Start BEst Seller Area -->
	<!-- Best Sale Area -->
	<section class="best-seel-area pt--80 pb--60">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section__title text-center pb--50">
						<h2 class="title__be--2">Best <span class="color--theme">Seller </span></h2>
						<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
					</div>
				</div>
			</div>
		</div>
		<div class="slider center">
			@foreach ($best_seller as $product)
				<!-- Single product start -->
				<div class="product product__style--3">
					<div class="product__thumb">
						<a class="first__img" href="{{ route('products.show', $product->id) }}"><img src="{{ $product->images[0]->path }}" alt="product image"></a>
					</div>
					<div class="product__content content--center">
						<div class="action">
							<div class="actions_inner">
								<ul class="add_to_links">
									<li><a class="cart" href=""><i class="bi bi-shopping-bag4"></i></a></li>
									<li><a class="wishlist" href="#"><i class="bi bi-shopping-cart-full"></i></a></li>
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
				<!-- Single product end -->
			@endforeach
		</div>
	</section>
	<!-- Best Sale Area Area -->
@endsection

@section('quickview-product')
	<div id="quickview-wrapper">
        <!-- Modal -->
        @foreach ($new_products as $product)
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
	                            <!-- End product images -->
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
	                                    <a href="#">@lang('labels.add_to_cart')</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        @endforeach
        @foreach ($all_products as $product)
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
	                                    <a href="#">@lang('labels.add_to_cart')</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        @endforeach
        @foreach ($best_seller as $product)
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
	                                    <a href="#">@lang('labels.add_to_cart')</a>
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
