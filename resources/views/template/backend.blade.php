<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>HMS - Hotel Management System</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   container boxed-layout fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border container boxed-layout">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="assets/html/ltr/vertical-menu-template-light/index.html"><img class="brand-logo" alt="stack admin logo" src="{{ asset('assets/app-assets/images/logo/stack-logo.png')}}">
                            <h2 class="brand-text">HMS</h2>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="navbar-toggleable-sm" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{ asset('assets/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span><span class="user-name">John Doe</span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <!-- main menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-border" data-scroll-to-active="true">
        <!-- main menu header-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="#"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge badge-primary badge-pill float-right mr-2">5</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-zap"></i><span class="menu-title" data-i18n="">Rooms</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{route('guests.index')}}" data-i18n="nav.starter_kit.1_column">Guests</a>
                        </li>
                        <li><a class="menu-item" href="{{route('rooms.index')}}" data-i18n="nav.starter_kit.1_column">Rooms</a>
                        </li>
                        <li><a class="menu-item" href="{{route('roomtypes.index')}}" data-i18n="nav.starter_kit.1_column">Types</a>
                        </li>
                        <li><a class="menu-item" href="{{route('roomservices.index')}}" data-i18n="nav.starter_kit.2_columns">Services</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-file"></i><span class="menu-title" data-i18n="">Changelog</span><span class="badge badge badge-pill badge-danger float-right">3.2</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="">Raise Support</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-folder"></i><span class="menu-title" data-i18n="">Documentation</span></a>
                </li>
            </ul>
        </div>
        <!-- /main menu content-->
        <!-- main menu footer-->
        <!-- main menu footer-->
    </div>
    <!-- / main menu-->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/customizer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
