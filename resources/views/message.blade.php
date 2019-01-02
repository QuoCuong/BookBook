@extends('layouts.app')

@section('oth-page')
    oth-page
@endsection

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">@lang('labels.message')</h2>
                        <nav class="bradcaump-content">
                          <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb_item active">@lang('labels.message')</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->

    <!-- Start Message Area -->
    <section class="page_error section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error__inner text-center">
                        <div class="error__content">
                            @if ($title)
                                <h2>{{ $title }}</h2>
                            @endif
                            @if ($message)
                                <p>{{ $message }}</p>
                            @endif
                            @if ($url)
                                <p>Nhấn vào <a style="text-decoration: underline;" href="{{ $url }}">đây</a> để quay lại.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Message Area -->

@endsection
