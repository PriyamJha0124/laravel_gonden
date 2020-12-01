<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
<!--DRAWER START-->
<div class="app-drawer-wrapper">
    <div class="drawer-nav-btn">
        <button type="button" class="hamburger hamburger--elastic is-active">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
    </div>
    <div class="drawer-content-wrapper">
        <div class="scrollbar-container">
            <div class="drawer-section">
                <div class="p-3">
                    <div class="row">
                        <div class="col-sm-12 col-xl-6">
                            <button class="btn-icon-vertical mb-3 btn-transition btn-block btn btn-outline-primary" data-toggle="dropdown" aria-expanded="false"><i class="lnr-lock btn-icon-wrapper"> </i><span
                                        class="badge badge-primary badge-dot badge-dot-sm badge-dot-inside"> </span>Plugins
                            </button>

                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                <div class="scrollbar-container">
                                    <button type="button" tabindex="0" class="dropdown-item">Service Calendar</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Knowledge Base</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Accounts</button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <button type="button" tabindex="0" class="dropdown-item">Products</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Rollup Queries</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <button class="btn-icon-vertical mb-3 btn-transition btn-block btn btn-outline-danger"><i class="lnr-film-play btn-icon-wrapper"> </i><span
                                        class="badge badge-danger badge-dot badge-dot-sm badge-dot-inside"> </span>Affiliate Videos
                            </button>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <button class="btn-icon-vertical mb-3 btn-transition btn-block btn btn-outline-alternate" data-toggle="dropdown" aria-expanded="false"><i class="lnr-cog btn-icon-wrapper"> </i><span class="badge badge-alternate badge-dot badge-dot-inside"> </span>Tools
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                <div class="scrollbar-container ps">
                                    <a href="javascript:;" tabindex="0" class="dropdown-item">API</a>
                                    <a href="javascript:;" tabindex="0" class="dropdown-item">Webhooks</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="javascript:;" tabindex="0" class="dropdown-item">Advance Functions</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('admin.import-coupons')}}" tabindex="0" class="dropdown-item">Import Coupon Codes</a>
                                    <a href="javascript:;" tabindex="0" class="dropdown-item">Import Affiliate
                                        Accounts</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('admin.export-affiliates')}}" tabindex="0" class="dropdown-item">Export Affiliates
                                        Accounts</a>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6">
                            <button class="btn-icon-vertical mb-3 btn-transition btn-block btn btn-outline-dark" data-toggle="dropdown" aria-expanded="false"><i class="pe-7s-wallet btn-icon-wrapper"> </i><span class="badge badge-dark badge-dot badge-dot-inside"> </span>Logs
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                <div class="scrollbar-container">
                                    <button type="button" tabindex="0" class="dropdown-item">Service Calendar</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Knowledge Base</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Accounts</button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <button type="button" tabindex="0" class="dropdown-item">Products</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Rollup Queries</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<!--DRAWER END-->

<!--SCRIPTS INCLUDES-->

<!--CORE-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

<!--Chart.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!--Multiselect-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!--Toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>

<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!--TABLES -->
<!--DataTables-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.19/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{mix('assets/admin/js/lib.js')}}"></script>
<script src="{{mix('assets/admin/js/main.js')}}"></script>

@stack('scripts')

</body>
</html>
