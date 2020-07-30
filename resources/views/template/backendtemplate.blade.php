<!DOCTYPE html>
<html lang="en">
    <!-- begin::Head -->
    <head>
        <base href=""/>
        <meta charset="utf-8"/>
        <title>
            Hotel Management System | Ignite Source
        </title>
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
        <meta content="Latest updates and statistic charts" name="description"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700" rel="stylesheet" type="text/css"/>
        <link href="assets/media/logos/favicon.ico" rel="shortcut icon"/>
        <link href="{{asset('plugins/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}" />
        <script src="{{ asset('js/app.js') }}">
        </script>
        <script src="{{asset('plugins/datatables/datatables.bundle.js')}}">
        </script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    </head>
<!-- end::Head -->
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div class="kt-header-mobile kt-header-mobile--fixed " id="kt_header_mobile">
        <div class="kt-header-mobile__logo">
            <a href="{{route('dashboard')}}">
                <span class="logo">
                    <b style="color:#db1430">
                        Ignite
                    </b>
                    Source
                </span>
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler">
                <span>
                </span>
            </button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler">
                <i class="flaticon-more">
                </i>
            </button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn">
                <i class="la la-close">
                </i>
            </button>
            <div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{route('dashboard')}}">
                            <span class="logo">
                                <b style="color:#db1430">
                                    Ignite
                                </b>
                                Source
                            </span>
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                            <span>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- end:: Aside -->
                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div class="kt-aside-menu " data-ktmenu-dropdown-timeout="500" data-ktmenu-scroll="1" data-ktmenu-vertical="1" id="kt_aside_menu">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item  {{Request::segment(1) == '' ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{route('dashboard')}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-icon flaticon2-architecture-and-city"></i>
                                    <span class="kt-menu__link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">
                                    Custom
                                </h4>
                                <i class="kt-menu__section-icon flaticon-more-v2">
                                </i>
                            </li>
                            @foreach($customs as $custom)
                            @php $routename = $custom->name.'.index'; @endphp
                            <li class="kt-menu__item {{Request::segment(1) == $custom->name ? 'kt-menu__item--active' : ''}}">
                                <a class="kt-menu__link" href="{{route($routename)}}">
                                    <i class="kt-menu__link-icon {{$custom->icon}}">
                                    </i>
                                    <span class="kt-menu__link-text">
                                        {{ucfirst($custom->name)}}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">
                                    Settings
                                </h4>
                                <i class="kt-menu__section-icon flaticon-more-v2">
                                </i>
                            </li>
                            @foreach($settings as $setting)
                            @php $routename = $setting->name.'.index'; @endphp
                            <li class="kt-menu__item {{Request::segment(1) == $setting->name ? 'kt-menu__item--active' : ''}}">
                                <a class="kt-menu__link" href="{{route($routename)}}">
                                    <i class="kt-menu__link-icon {{$setting->icon}}">
                                    </i>
                                    <span class="kt-menu__link-text">
                                        {{ucfirst($setting->name)}}
                                    </span>
                                    <span class="kt-menu__link-text justify-content-end">
                                        <span class="kt-badge kt-badge--danger kt-badge--md">12</span>
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- end:: Aside Menu -->
            </div>
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                <div class="kt-header kt-grid__item kt-header--fixed " id="kt_header">
                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn">
                        <i class="la la-close">
                        </i>
                    </button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div class="kt-header-menu kt-header-menu-mobile kt-header-menu--layout-default " id="kt_header_menu">
                            <ul class="kt-menu__nav ">
                                <li aria-haspopup="true" class="kt-menu__item kt-menu__item--active ">
                                    <a class="kt-menu__link " href="{{route('dashboard')}}">
                                        <span class="kt-menu__link-text">
                                            Application
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end: Header Menu -->
                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                        <!--begin: Notifications -->
                        <div class="kt-header__topbar-item dropdown">
                            <div aria-expanded="true" class="kt-header__topbar-wrapper" data-offset="30px,0px" data-toggle="dropdown">
                                <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
                                    <i class="flaticon2-bell-alarm-symbol">
                                    </i>
                                    <span class="kt-pulse__ring">
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
                                <form>
                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(assets/media/misc/bg-1.jpg)">
                                        <h3 class="kt-head__title">
                                            User Notifications
                                            <span class="btn btn-success btn-sm btn-bold btn-font-md">
                                                23 new
                                            </span>
                                        </h3>
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
                                            <li class="nav-item">
                                                <a aria-selected="true" class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                    Alerts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a aria-selected="false" class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
                                                    Events
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a aria-selected="false" class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
                                                    Logs
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end: Head -->
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-height="300" data-mobile-height="200" data-scroll="true">
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-line-chart kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-box-1 kt-font-brand">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-chart2 kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Application has been approved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-image-file kt-font-warning">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New file has been uploaded
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            5 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-drop kt-font-info">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New user feedback received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            8 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart-2 kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            System reboot has been successfully completed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            12 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-favourite kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been placed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            15 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item kt-notification__item--read" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-security kt-font-warning">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer comment recieved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-height="300" data-mobile-height="200" data-scroll="true">
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-line-chart kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-box-1 kt-font-brand">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-chart2 kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Application has been approved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-image-file kt-font-warning">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New file has been uploaded
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            5 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-drop kt-font-info">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New user feedback received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            8 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart-2 kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            System reboot has been successfully completed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            12 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-favourite kt-font-brand">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been placed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            15 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item kt-notification__item--read" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-security kt-font-warning">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer comment recieved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="kt-notification__item" href="#">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart kt-font-success">
                                                        </i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                            <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                    <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                        All caught up!
                                                        <br>
                                                            No new notifications.
                                                        </br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end: Notifications -->
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-offset="0px,0px" data-toggle="dropdown">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">
                                        Hi,
                                    </span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile">
                                        Sean
                                    </span>
                                    <img alt="Pic" class="kt-radius-100" src="{{asset('assets/media/users/300_25.jpg')}}"/>
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                                    <div class="kt-user-card__avatar">
                                        <img alt="Pic" class="kt-hidden" src="assets/media/users/300_25.jpg"/>
                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                                            S
                                        </span>
                                    </div>
                                    <div class="kt-user-card__name">
                                        Sean Stone
                                    </div>
                                    <div class="kt-user-card__badge">
                                        <span class="btn btn-success btn-sm btn-bold btn-font-md">
                                            23 messages
                                        </span>
                                    </div>
                                </div>
                                <!--end: Head -->
                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a class="kt-notification__item" href="custom/apps/user/profile-1/personal-information.html">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success">
                                            </i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Profile
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Account settings and more
                                            </div>
                                        </div>
                                    </a>
                                    <a class="kt-notification__item" href="custom/apps/user/profile-3.html">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-mail kt-font-warning">
                                            </i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Messages
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Inbox and tasks
                                            </div>
                                        </div>
                                    </a>
                                    <a class="kt-notification__item" href="custom/apps/user/profile-2.html">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-rocket-1 kt-font-danger">
                                            </i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Activities
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Logs and notifications
                                            </div>
                                        </div>
                                    </a>
                                    <a class="kt-notification__item" href="custom/apps/user/profile-3.html">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-hourglass kt-font-brand">
                                            </i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Tasks
                                            </div>
                                            <div class="kt-notification__item-time">
                                                latest tasks and projects
                                            </div>
                                        </div>
                                    </a>
                                    <a class="kt-notification__item" href="custom/apps/user/profile-1/overview.html">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-cardiogram kt-font-warning">
                                            </i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Billing
                                            </div>
                                            <div class="kt-notification__item-time">
                                                billing & statements
                                                <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">
                                                    2 pending
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="kt-notification__custom kt-space-between">
                                        <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="custom/user/login-v2.html" target="_blank">
                                            Sign Out
                                        </a>
                                        <a class="btn btn-clean btn-sm btn-bold" href="custom/user/login-v2.html" target="_blank">
                                            Upgrade Plan
                                        </a>
                                    </div>
                                </div>
                                <!--end: Navigation -->
                            </div>
                        </div>
                        <!--end: User Bar -->
                    </div>
                    <!-- end:: Header Topbar -->
                </div>
                <!-- end:: Header -->
                <div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Subheader -->
                    <div class="kt-subheader kt-grid__item" id="kt_subheader">
                        <div class="kt-container kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title">
                                    Dashboard
                                </h3>
                                <span class="kt-subheader__separator kt-hidden">
                                </span>
                                <div class="kt-subheader__breadcrumbs">
                                    <a class="kt-subheader__breadcrumbs-home" href="#">
                                        <i class="flaticon2-shelter">
                                        </i>
                                    </a>
                                    <span class="kt-subheader__breadcrumbs-separator">
                                    </span>
                                    <a class="kt-subheader__breadcrumbs-link" href="">
                                        Application
                                    </a>
                                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                                </div>
                            </div>
                            <div class="kt-subheader__toolbar">
                                <div class="kt-subheader__wrapper">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:: Subheader -->
                    <!-- begin:: Content -->
                    @yield('content')
                    <!-- end:: Content -->
                </div>
                <!-- begin:: Footer -->
                <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            2020 ©
                            <a class="kt-link" href="https://www.ignitesource.net/" target="_blank">
                                Ignite Source
                            </a>
                        </div>
                        <div class="kt-footer__menu">
                            <a class="kt-footer__menu-link kt-link" href="http://keenthemes.com/metronic" target="_blank">
                                About
                            </a>
                            <a class="kt-footer__menu-link kt-link" href="http://keenthemes.com/metronic" target="_blank">
                                Team
                            </a>
                            <a class="kt-footer__menu-link kt-link" href="http://keenthemes.com/metronic" target="_blank">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end:: Footer -->
            </div>
        </div>
    </div>
    <!-- end:: Page -->
    <!-- begin::Scrolltop -->
    <div class="kt-scrolltop" id="kt_scrolltop">
        <i class="fa fa-arrow-up">
        </i>
    </div>
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script src="{{ asset('js/app.js') }}">
    </script>
    <script src="{{asset('plugins/datatables/datatables.bundle.js')}}">
    </script>
    <script src="{{ asset('js/custom.js') }}">
    </script>
    <script>
        var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#2c77f4",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
    </script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript">
    </script>
    @yield('script')
</body>
<!-- end::Body -->
