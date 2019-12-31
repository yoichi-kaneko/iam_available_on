
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: AdminCC - Bootstrap 4 Dashboard ::</title>
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <!-- Favicon-->
{{Html::style('css/libs.css')}}
{{Html::style('assets/plugins/fullcalendar/fullcalendar.css')}}
<!-- Custom Css -->
    {{Html::style('css/main.css')}}
    {{Html::style('css/all-themes.css')}}
    {{Html::style('css/calendar.css')}}
</head>
<body class="theme-blue-grey">
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

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- #Float icon -->
<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
    <li class="mfb-component__wrap"> <a href="#" class="mfb-component__button--main"> <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i> <i class="mfb-component__main-icon--active zmdi zmdi-close"></i> </a>
        <ul class="mfb-component__list">
            <li> <a href="mail-inbox.html" data-mfb-label="Inbox" class="mfb-component__button--child bg-blue"> <i class="zmdi zmdi-email mfb-component__child-icon"></i> </a> </li>
            <li> <a href="chat.html" data-mfb-label="Chat App" class="mfb-component__button--child bg-orange"> <i class="zmdi zmdi-comments mfb-component__child-icon"></i> </a> </li>
            <li> <a href="blog.html" data-mfb-label="Blogger" class="mfb-component__button--child bg-purple"> <i class="zmdi zmdi-blogger mfb-component__child-icon"></i> </a> </li>
        </ul>
    </li>
</ul>

<!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="zmdi zmdi-search"></i> </div>
    <input type="text" placeholder="Search...">
    <div class="close-search"> <i class="zmdi zmdi-close"></i> </div>
</div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">AdminCC</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li>
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-notifications"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-orange"> <i class="material-icons">person_add</i> </div>
                                    <div class="menu-info">
                                        <h4>12 new members joined</h4>
                                        <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-cyan"> <i class="material-icons">add_shopping_cart</i> </div>
                                    <div class="menu-info">
                                        <h4>4 sales made</h4>
                                        <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-blue"> <i class="material-icons">delete_forever</i> </div>
                                    <div class="menu-info">
                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-green"> <i class="material-icons">mode_edit</i> </div>
                                    <div class="menu-info">
                                        <h4><b>Nancy</b> changed name</h4>
                                        <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-pink"> <i class="material-icons">comment</i> </div>
                                    <div class="menu-info">
                                        <h4><b>John</b> commented your post</h4>
                                        <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-lime"> <i class="material-icons">cached</i> </div>
                                    <div class="menu-info">
                                        <h4><b>John</b> updated status</h4>
                                        <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <div class="icon-circle bg-purple"> <i class="material-icons">settings</i> </div>
                                    <div class="menu-info">
                                        <h4>Settings updated</h4>
                                        <p> <i class="material-icons">access_time</i> Yesterday </p>
                                    </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            <li class="dropdown hidden-sm-down"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-flag"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks list-unstyled">
                            <li> <a href="javascript:void(0);">
                                    <h4> Footer display issue <small>72%</small> </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <h4> Make new buttons <small>56%</small> </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <h4> Create new dashboard <small>68%</small> </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <h4> Solve transition issue <small>77%</small> </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                    <h4> Answer Giphotos questions <small>87%</small> </h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                    </div>
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                </ul>
            </li>
            <li><a href="sign-in.html" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
        </ul>
    </div>
</nav>

@yield('content')

<!-- Jquery Core Js -->

{{Html::script('js/libs.js')}} <!-- Lib Scripts Plugin Js -->
{{Html::script('assets/bundles/vendorscripts.bundle.js')}} <!-- Lib Scripts Plugin Js -->

{{Html::script('assets/bundles/fullcalendarscripts.bundle.js')}} <!--/ calender javascripts -->
{{Html::script('assets/plugins/bootstrap-notify/bootstrap-notify.js')}} <!--/ calender javascripts -->

{{Html::script('assets/bundles/mainscripts.bundle.js')}}<!-- Custom Js -->
{{Html::script('assets/js/const.js')}}
{{Html::script('assets/js/pages/calendar/calendar.js')}}
{{Html::script('assets/js/pages/ui/notifications.js')}}
</body>
</html>
