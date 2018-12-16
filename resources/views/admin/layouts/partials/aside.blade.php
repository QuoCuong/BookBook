<aside class="app-layout-drawer">
    <!-- Drawer scroll area -->
    <div class="app-layout-drawer-scroll">
        <!-- Drawer logo -->
        <div id="logo" class="drawer-header">
            <a href="{{ route('admin.dashboard') }}"><img class="img-responsive" src="{{ asset('admin/img/logo/logo-backend.png') }}" title="AppUI" alt="AppUI" /></a>
        </div>

        <!-- Drawer navigation -->
        <nav class="drawer-main">
            <ul class="nav nav-drawer">

                <li class="nav-item nav-drawer-header">@lang('admin.aside.admin')</li>

                <li class="nav-item active">
                    <a href="{{ route('admin.dashboard') }}"><i class="ion-ios-speedometer-outline"></i> @lang('admin.dashboard')</a>
                </li>

                <li class="nav-item">
                    <a href=""><i class="ion-ios-people-outline"></i> @lang('admin.aside.user_management')</a>
                </li>

                <li class="nav-item">
                    <a href=""><i class="ion-ios-book-outline"></i> @lang('admin.aside.book_management')</a>
                </li>

                <li class="nav-item">
                    <a href=""><i class="ion-ios-paper-outline"></i> @lang('admin.aside.order_management')</a>
                </li>

                <li class="nav-item">
                    <a href=""><i class="ion-ios-chatboxes-outline"></i> @lang('admin.aside.comment_management')</a>
                </li>

                @yield('function')

            </ul>
        </nav>
        <!-- End drawer navigation -->

        <div class="drawer-footer">
            <p class="copyright">AppUI Template &copy;</p>
        </div>
    </div>
    <!-- End drawer scroll area -->
</aside>
