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
	Danh mục / Thêm danh mục
@endsection

@section('content')

	<main class="app-layout-content">

		<!-- Page Content -->
		<div class="container-fluid p-y-md">
			<div style="margin-bottom: 20px;">
	    		<a href="{{ url()->previous() }}" class="btn btn-app-light"><i class="ion-ios-arrow-back"></i> Quay lại</a>
	    	</div>
			<div class="card">
                <div class="card-header bg-green bg-inverse">
                    <h4>Thêm danh mục</h4>
                    <!-- <ul class="card-actions">
                        <li>
                            <button type="button"><i class="ion-more"></i></button>
                        </li>
                    </ul> -->
                </div>
                <div class="card-block">
                    <p></p>
                </div>
            </div>
		</div>
		<!-- End Page Content -->

	</main>

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