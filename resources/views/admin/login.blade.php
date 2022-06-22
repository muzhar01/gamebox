<!DOCTYPE html>
<html lang="en">

<head>
    <title>Game Portal | Login </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('admin_assets/img/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/style.css') }}">
</head>

<body class="fix-menu">
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

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <div class="text-center">
                            <img src="{{ asset('admin_assets/img/logo-dark.png') }}" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Sign In</h3>
                                </div>
                            </div>

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <hr />

                            <form class="md-float-material" method="POST" action="{{ route('admin-login') }}">
                                @csrf
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email Address">
                                    <span class="md-line"></span>

                                </div>
                                @if ($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <a href="#" class="text-right f-w-600 text-inverse"> Forgot Your
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>
                            </form>
                            <hr />

                        </div>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('admin_assets/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/js/common-pages.js') }}"></script>
</body>

</html>
