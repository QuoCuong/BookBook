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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my__account__wrapper">
                    <h3 class="account__title">@lang('labels.account.reset_password')</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label>@lang('labels.account.email_address') <span>*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form__btn text-center">
                                <button>@lang('labels.account.send_forgot_password_link')</button>
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