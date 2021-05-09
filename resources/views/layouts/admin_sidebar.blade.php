<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    @if(auth()->check()) <meta name="user-id" content="{{ Auth::user()->id }}"> @endif--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/codebase.core.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/bky.css') }}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        <div id="page-container"
            class="sidebar-o sidebar-inverse  side-scroll page-header-modern main-content-boxed enable-page-overlay">
            <nav id="sidebar" data-simplebar="init" style="background-color: #0a0a0a;">
                <div class="simplebar-track vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 514px;"></div>
                </div>
                <div class="simplebar-track horizontal" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 130px;"></div>
                </div>
                <div class="simplebar-scroll-content" style="padding-right: 15px; margin-bottom: -30px;">
                    <div class="simplebar-content" style="padding-bottom: 15px; margin-right: -15px;">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Side Header -->
                            <div class="content-header content-header-fullrow px-15">
                                <!-- Mini Mode -->
                                <div class="content-header-section sidebar-mini-visible-b">
                                    <!-- Logo -->
                                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                    </span>
                                    <!-- END Logo -->
                                </div>
                                <!-- END Mini Mode -->

                                <!-- Normal Mode -->
                                <div class="content-header-section py-30 text-center align-parent sidebar-mini-hidden">
                                    <!-- Close Sidebar, Visible only on mobile screens -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                                        data-toggle="layout" data-action="sidebar_close">
                                        <i class="fa fa-navicon text-white"></i>
                                    </button>
                                    <!-- END Close Sidebar -->

                                    <!-- Logo -->
                                    <div class="content-header-item py-30">
                                        <a class="font-w700" href="/">
                                            <span>
                                                <img style="width: 90%" src="{{asset('logoWhite.png')}}" alt="logo">
                                            </span>
                                        </a>
                                    </div>
                                    <!-- END Logo -->
                                </div>
                                <!-- END Normal Mode -->
                            </div>
                            <!-- END Side Header -->


                            <!-- Side Navigation -->
                            <div class="content-side content-side-full" style="margin-top: 100px !important;">
                                <ul class="nav-main">
                                    <li>
                                        <a class="active" href="{{ route('admin.dashboard') }}">
                                            <i class="si si-map bky-color"></i>
                                            <span class="sidebar-mini-hide">
                                                Dashboard
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                            <i class="si si-bar-chart bky-color"></i>
                                            <span class="sidebar-mini-hide">Shipments
                                        </a>
                                        <ul>

                                            <li to="pending-deposits" tag="li">
                                                <a href="{{ route('admin.shipments.pending') }}">Pending</a>
                                            </li>

                                            <li to="pending-withdrawals" tag="li">
                                                <a href="{{ route('admin.shipments.delivered') }}">Delivered</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a class="av-menu" href="{{ route('admin.users.index') }}">
                                            <i class="si si-users bky-color"></i>
                                            Users
                                        </a>
                                    </li>
                                    <li>
                                        <a class="av-menu" href="{{ route('admin.managers.index') }}">
                                            <i class="si si-users bky-color"></i>
                                            Managers
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-menu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="si si-power bky-color"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Side Navigation -->
                        </div>
                        <!-- Sidebar Content -->
                    </div>
                </div>
            </nav>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container" data-toggle="layout" data-action="sidebar_close_sm">
                <!-- Page Content -->
                <div class="content">
                    {{--                <div id="page-loader" class="show bg-gd-default"></div>--}}
                    @yield('content')
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-left">
                        <a class="font-w600" href="#" target="_blank">Courier</a> &copy; <span
                            class="js-year-copy">2021</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>

    </div>
</body>

<script src="{{ asset('js/codebase.app.js') }}"></script>
<script src="{{ asset('js/laravel.app.js') }}"></script>
@yield('script')

</html>
