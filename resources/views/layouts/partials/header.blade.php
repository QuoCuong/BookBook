<header id="wn__header" class="@yield('oth-page')header__area header__absolute sticky__header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6 col-lg-2">
				<div class="logo">
					<a href="{{ route('home') }}">
						<img src="{{ asset('images/logo/logo.png') }}" alt="logo images">
					</a>
				</div>
			</div>
			<div class="col-lg-8 d-none d-lg-block">
				<nav class="mainmenu__nav">
					<ul class="meninmenu d-flex justify-content-start">
						<li class="drop with--one--item">
							<a href="{{ route('home') }}">@lang('labels.home.home')</a>
						</li>
						@foreach ($categories as $category)
							<li class="drop">
								<a href="#">{{ $category->name }}</a>
								<div class="megamenu mega03">
									@foreach ($category->subcategories as $subcategory)
										<ul class="item item02">
											<li class="title"><a href="">{{ $subcategory->name }}</a></li>
											@foreach ($subcategory->child as $subsubcategory)
												<li class="subsubcategory">
													<a href="#">{{ $subsubcategory->name }}</a>
												</li>
											@endforeach
										</ul>
									@endforeach
								</div>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
			<div class="col-md-6 col-sm-6 col-6 col-lg-2">
				<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
					<li class="shop_search"><a class="search__active" href="#"></a></li>
					<li class="wishlist"><a href="#"></a></li>
					<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">3</span></a>
						<!-- Start Shopping Cart -->
						<div class="block-minicart minicart__active">
							<div class="minicart-content-wrapper">
								<div class="micart__close">
									<span>close</span>
								</div>
								<div class="items-total d-flex justify-content-between">
									<span>3 items</span>
									<span>Cart Subtotal</span>
								</div>
								<div class="total_amount text-right">
									<span>$66.00</span>
								</div>
								<div class="mini_action checkout">
									<a class="checkout__btn" href="cart.html">Go to Checkout</a>
								</div>
								<div class="single__items">
									<div class="miniproduct">
										<div class="item01 d-flex">
											<div class="thumb">
												<a href="product-details.html"><img src="images/product/sm-img/1.jpg" alt="product images"></a>
											</div>
											<div class="content">
												<h6><a href="product-details.html">Voyage Yoga Bag</a></h6>
												<span class="prize">$30.00</span>
												<div class="product_prize d-flex justify-content-between">
													<span class="qun">Qty: 01</span>
													<ul class="d-flex justify-content-end">
														<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
														<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="item01 d-flex mt--20">
											<div class="thumb">
												<a href="product-details.html"><img src="images/product/sm-img/3.jpg" alt="product images"></a>
											</div>
											<div class="content">
												<h6><a href="product-details.html">Impulse Duffle</a></h6>
												<span class="prize">$40.00</span>
												<div class="product_prize d-flex justify-content-between">
													<span class="qun">Qty: 03</span>
													<ul class="d-flex justify-content-end">
														<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
														<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="item01 d-flex mt--20">
											<div class="thumb">
												<a href="product-details.html"><img src="images/product/sm-img/2.jpg" alt="product images"></a>
											</div>
											<div class="content">
												<h6><a href="product-details.html">Compete Track Tote</a></h6>
												<span class="prize">$40.00</span>
												<div class="product_prize d-flex justify-content-between">
													<span class="qun">Qty: 03</span>
													<ul class="d-flex justify-content-end">
														<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
														<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mini_action cart">
									<a class="cart__btn" href="cart.html">View and edit cart</a>
								</div>
							</div>
						</div>
						<!-- End Shopping Cart -->
					</li>
					@guest
						<li class="setting__bar__icon">
							<a class="setting__active" href="#"></a>
							<div class="searchbar__content setting__block">
								<div class="content-inner">
									<div class="switcher-currency">
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<div class="setting__menu">
													<span><a href="{{ route('login') }}">@lang('labels.home.login')</a></span>
													<span><a href="{{ route('register') }}">@lang('labels.home.register')</a></span>
													<span><a href="{{ route('password.request') }}">@lang('labels.home.forgot_password')</a></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					@else
						<li class="setting__bar__icon">
							<a class="setting__active" href="#"></a>
							<div class="searchbar__content setting__block">
								<div class="content-inner">
									<div class="switcher-currency">
										<div class="switcher-options">
											<div class="switcher-currency-trigger">
												<div class="setting__menu">
													@if (Auth::user()->role_id == 1)
														<span><a href="{{ route('admin.dashboard') }}">Quản trị viên</a></span>
													@endif
													<span><a href="{{ route('home') }}">@lang('labels.home.my_account')</a></span>
													<span>
														<form method="POST" action="{{ route('logout') }}">
															@csrf
															<button class="btn-logout">@lang('labels.home.logout')</button>
														</form>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					@endguest
				</ul>
			</div>
		</div>
		<!-- Start Mobile Menu -->
		<div class="row d-none">
			<div class="col-lg-12 d-none">
				<nav class="mobilemenu__nav">
					<ul class="meninmenu">
						<li><a href="{{ route('home') }}">@lang('labels.home.home')</a></li>
						@foreach ($categories as $category)
							<li><a href="#">{{ $category->name }}</a>
								<ul>
									@foreach ($category->subcategories as $subcategory)
										<li>
											<a href="about.html">{{ $subcategory->name }}</a>
											<ul>
												@foreach ($subcategory->child as $subsubcategory)
													<li><a href="portfolio.html">{{ $subsubcategory->name }}</a></li>
												@endforeach
											</ul>
										</li>
									@endforeach
								</ul>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
		<!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->	
	</div>		
</header>