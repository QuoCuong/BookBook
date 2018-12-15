<aside class="app-layout-drawer">
    <!-- Drawer scroll area -->
    <div class="app-layout-drawer-scroll">
        <!-- Drawer logo -->
        <div id="logo" class="drawer-header">
            <a href="{{ route('admin.dashboard') }}"><img class="img-responsive" src="img/logo/logo-backend.png" title="AppUI" alt="AppUI" /></a>
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

                <!-- <li class="nav-item nav-drawer-header">Components</li>

                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-ios-calculator-outline"></i> UI Elements</a>
                    <ul class="nav nav-subnav">
                        <li>
                            <a href="base_ui_buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="base_ui_cards.html">Cards</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i> Forms</a>
                    <ul class="nav nav-subnav">

                        <li>
                            <a href="base_forms_elements.html">Elements</a>
                        </li>

                        <li>
                            <a href="base_forms_samples.html">Samples</a>
                        </li>

                        <li>
                            <a href="base_forms_pickers_select.html">Pickers &amp; Select</a>
                        </li>

                        <li>
                            <a href="base_forms_validation.html">Validation</a>
                        </li>

                        <li>
                            <a href="base_forms_wizard.html">Wizard</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-ios-list-outline"></i> Tables</a>
                    <ul class="nav nav-subnav">

                        <li>
                            <a href="base_tables_styles.html">Styles</a>
                        </li>

                        <li>
                            <a href="base_tables_responsive.html">Responsive</a>
                        </li>

                        <li>
                            <a href="base_tables_tools.html">Tools</a>
                        </li>

                        <li>
                            <a href="base_tables_pricing.html">Pricing</a>
                        </li>

                        <li>
                            <a href="base_tables_datatables.html">Wizard</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-ios-browsers-outline"></i> Pages</a>
                    <ul class="nav nav-subnav">

                        <li>
                            <a href="base_pages_blank.html">Blank</a>
                        </li>

                        <li>
                            <a href="base_pages_inbox.html">Inbox</a>
                        </li>

                        <li>
                            <a href="base_pages_invoice.html">Invoice</a>
                        </li>

                        <li>
                            <a href="base_pages_profile.html">Profile</a>
                        </li>

                        <li>
                            <a href="base_pages_search.html">Search</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-social-javascript-outline"></i> JS plugins</a>
                    <ul class="nav nav-subnav">

                        <li>
                            <a href="base_js_maps.html">Maps</a>
                        </li>

                        <li>
                            <a href="base_js_sliders.html">Sliders</a>
                        </li>

                        <li>
                            <a href="base_js_charts_flot.html">Charts - Flot</a>
                        </li>

                        <li>
                            <a href="base_js_charts_chartjs.html">Charts - Chart.js</a>
                        </li>

                        <li>
                            <a href="base_js_charts_sparkline.html">Charts - Sparkline</a>
                        </li>

                        <li>
                            <a href="base_js_draggable.html">Draggable</a>
                        </li>

                        <li>
                            <a href="base_js_syntax_highlight.html">Syntax highlight</a>
                        </li>

                    </ul>
                </li> -->

            </ul>
        </nav>
        <!-- End drawer navigation -->

        <div class="drawer-footer">
            <p class="copyright">AppUI Template &copy;</p>
        </div>
    </div>
    <!-- End drawer scroll area -->
</aside>
