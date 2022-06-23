<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gaming Portal | Dashboard </title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/themify-icons.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/icofont.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/jquery.mCustomScrollbar.css')}}">
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/admin/dashboard') }}">
                            <img class="img-fluid" src="{{ asset('admin_assets/img/logo.png') }}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="{{ url('/admin/dashboard') }}">
                                    <img src="{{ asset('admin_assets/img/logo.png') }}" class="img-radius" alt="Image">
                                    <span>Admin</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-lock"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{ url('/admin/dashboard') }}">
                                        <span class="pcoded-micon"><i class="fa fa-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Caregoty</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-file"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="fa fa-gamepad bg-c-blue card1-icon" aria-hidden="true"></i>
                                                        
                                                        <span class="text-c-blue f-w-600">Use space</span>
                                                        <h4>49/50GB</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 fa fa-exclamation-triangle m-r-10"></i>Get more space
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="fa fa-th-list bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Revenue</span>
                                                        <h4>$23,589</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 fa fa-calendar m-r-10"></i>Last 24 hours
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="fa fa-database bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Fixed issue</span>
                                                        <h4>45</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 fa fa-tag m-r-10"></i>Tracked via microsoft
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="fa fa-cogs bg-c-yellow card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">Followers</span>
                                                        <h4>+562</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-yellow f-16 fa fa-spinner m-r-10"></i>Just update
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            
                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fixed-button">
                    <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
                    </a>
                </div>
            </div>
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
   
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('admin_assets/js/modernizr.js') }}"></script>
<!-- am chart -->
<script src="{{ asset('admin_assets/js/amcharts.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/serial.min.js') }}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{ asset('admin_assets/js/todo.js') }} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('admin_assets/js/custom-dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/script.js') }}"></script>
<script type="text/javascript " src="{{ asset('admin_assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('admin_assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/demo-12.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
</body>

</html>
