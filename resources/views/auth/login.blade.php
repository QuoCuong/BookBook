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
                    <h2 class="bradcaump-title">@lang('labels.login')</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="{{ route('home') }}">@lang('labels.home')</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">@lang('labels.login')</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="my__account__wrapper">
                    <h3 class="account__title text-center">@lang('labels.account.login')</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label>@lang('labels.account.email_address') <span>*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="has-error">
                                    <i>{{ $errors->first('email') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="input__box">
                                <label>@lang('labels.account.password')<span>*</span></label>
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                <div class="has-error">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="form__btn">
                                <button>@lang('labels.account.login')</button>
                                <label class="label-for-checkbox">
                                    <input class="input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="{{ route('password.request') }}">@lang('labels.account.forgot_password')?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End My Account Area -->

@endsection
