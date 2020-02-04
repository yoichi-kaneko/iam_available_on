
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @if (View::hasSection('use_ajax_post'))
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif
    <title>@yield('page_title')::この日空いてます</title>
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon"><!-- Favicon-->

{{Html::style('css/libs.css')}}
<!-- Custom Css -->
    {{Html::style('css/main.css')}}
    {{Html::style('css/all-themes.css')}}
</head>
<body class="theme-blue-grey">
@if (View::hasSection('use_page_loader'))
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-light-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
@endif

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

@if (Auth::check())
    <!-- #Float icon -->
    <ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
        <li class="mfb-component__wrap"> <a href="#" class="mfb-component__button--main"> <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i> <i class="mfb-component__main-icon--active zmdi zmdi-close"></i> </a>
            <ul class="mfb-component__list">
                <li> <a href="{{ action('Auth\LogoutController@index') }}" data-mfb-label="Logout" class="mfb-component__button--child bg-purple"> <i class="zmdi zmdi-square-right mfb-component__child-icon"></i> </a> </li>
                <li> <a href="{{ action('EditController@index') }}" data-mfb-label="Edit Profile" class="mfb-component__button--child bg-orange"> <i class="zmdi zmdi-account-circle mfb-component__child-icon"></i> </a> </li>
                <li> <a href="{{ action('CalendarController@me') }}" data-mfb-label="My Calendar" class="mfb-component__button--child bg-blue"> <i class="zmdi zmdi-calendar-check mfb-component__child-icon"></i> </a> </li>
            </ul>
        </li>
    </ul>
@endif

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ action('IndexController@index') }}">この日空いてます</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ action('PageController@howto') }}" class="mega-menu" data-close="true"><i class="zmdi zmdi-help"></i></a></li>
        </ul>
    </div>
</nav>

@yield('content')

<!-- Jquery Core Js -->

<script src="{{ mix('js/libs.js') }}"></script><!-- Lib Scripts Plugin Js -->
<script src="{{ mix('js/app.js') }}"></script><!-- Custom Js -->

@yield('js_file')
@if (session('message'))
    <input type="hidden" name="message" value="{{ session('message') }}">
@endif
</body>
</html>
