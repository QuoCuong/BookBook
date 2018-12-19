@extends('layouts.app')

@section('oth-page')
oth-page
@endsection

@section('content')

<!-- Start Bradcaump area -->
@include('layouts.partials.breadcrumbs')
<!-- End Bradcaump area -->

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="my__account__wrapper">
                    <h3 class="account__title text-center">@lang('labels.account.reset_password')</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="account__form">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="input__box">
                                <label>@lang('labels.account.email_address') <span>*</span></label>
                                <input type="text" value="{{ $email }}" disabled="">
                                @if ($errors->has('email'))
                                <div class="has-error">
                                    <i>{{ $errors->first('email') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="input__box">
                                <label>@lang('labels.account.password') <span>*</span></label>
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                <div class="has-error">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                            </div>
                            <div class="input__box">
                                <label>@lang('labels.account.password_confirm')<span>*</span></label>
                                <input type="password" name="password_confirmation">
                            </div>
                            <div class="form__btn">
                                <button>@lang('labels.account.change_password')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End My Account Area -->

@endsection
