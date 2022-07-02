@php
$lang = session()->get('lang') ?? 'en';
$logo = App\Models\Setting::where('key', 'logo')->first();
@endphp

<html lang="{{ $lang ?? 'en' }}" dir="{{ $lang && $lang == 'ar' ? 'rtl' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gamebox | Play Games Online</title>
    <meta name="description" content="Play Games Online">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/jquery-comments.css"> --}}
    <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/user.css">
    <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/style.css">
    {{-- <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/custom.css"> --}}
    <link rel="stylesheet" type="text/css" href="/front_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/front_assets/css/owl.theme.default.min.css">
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="/front_assets/css/custom.css">
    <style>
        body {
            background-image: url('/front_assets/background/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            top: 0 !important;
        }

		body{
			background-image: url('/front_assets/background/bg.png');
			background-repeat: no-repeat;
			background-size: cover;
			top: 0 !important;
		}
		.skiptranslate {
			display: none !important;
		}

        .home-page-slider {
            height: 35vw !important;
        }

        @media (min-width: 1000px) {
            .home-page-slider {
                height: 30vw !important;
            }
        }

        @media (min-width: 1500px) {
            .home-page-slider {
                height: 504px !important;
            }
        }
	</style>

</head>

<body id="page-top" dir="{{ $lang && $lang == 'ar' ? 'rtl' : '' }}">
    <div id="google_translate_element" class="d-none"></div>
    <!-- Navigation-->
    <div class="container site-container">
        <div class="site-content">
            <nav class="navbar navbar-expand-lg navbar-dark top-nav" id="mainNav">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-left collapsed" type="button" data-toggle="collapse"
                        data-target="#navb" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
                    <a class="navbar-brand js-scroll-trigger" href="/"><img
                            src="{{ isset($logo) ? asset('storage/logo/'.$logo->value) : '/front_assets/logo.png' }}" class="site-logo"
                            alt="Gamebox" style="height: 100px !important;"></a>
                    <div class="navbar-collapse collapse justify-content-end" id="navb">
                        <ul class="navbar-nav ml-auto text-uppercase">

                            {{-- <li class="nav-item"> <a class="nav-link" href="void:javascript(0)" id="changeLanguageBtn"
                                    data-current-language="en" translate="no">العربية</a> </li> --}}
                            @if($lang && $lang == 'ar')
                                <li class="nav-item"> <a class="nav-link" href="{{ route('home.language', 'en') }}" id="changeLanguageBtn">English</a> </li>
                            @else
                                <li class="nav-item"> <a class="nav-link" href="{{ route('home.language', 'ar') }}" id="changeLanguageBtn">العربية</a> </li>
                            @endif

                            @if (session()->has('USER_LOGIN'))
                                <li class="nav-item"> <a class="nav-link" href="{{ route('user-logout') }}"
                                        class="nav-link">Logout</a> </li>
                            @else
                                <li class="nav-item">  <a class="nav-link" data-toggle="modal" href="javascript:void(0)"
                                    onclick="openLoginModal();">Login \ Register</a> </li>
                            @endif

                        </ul>

                        {{-- Search Form  =========== --}}

                        {{-- <form class="form-inline my-2 my-lg-0 search-bar" action="/">
							<div class="input-group">
								<input type="hidden" name="viewpage" value="search">
								<input type="text" class="form-control rounded-left search" placeholder="Search game" name="slug" minlength="2" required="">
								<div class="input-group-append">
									<button type="submit" class="btn btn-search"> <i class="fa fa-search"></i> </button>
								</div>
							</div>
						</form> --}}
                    </div>
                </div>
            </nav>
            @if (isset($sliders))

			<div id="carouselExampleControls" class="home-page-slider carousel slide m-4" data-ride="carousel">
				<div class="carousel-inner">
					@foreach($sliders as $slider)
						<div class="carousel-item @if($loop->first) active @endif">
							<a href="{{ $slider->link }}">
								<img class="d-block w-100" src="{{ '/storage/sliders/' . ($slider->banner ?? '') }}" alt="">
							</a>
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			@endif

            @php
                $nav_categories =
                    \App\Models\Admin\Category::active()
                        ->orderBy('title', 'asc')
                        ->get() ?? [];
            @endphp

            <div class="nav-categories">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="">
                                <ul class="nav">
                                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/"
                                            class="nav-link {{ request()->is('/') ? 'active' : '' }}">All Games</a>
                                    </li>

                                    @foreach ($nav_categories as $category)
                                        <li
                                            class="nav-item {{ request()->is('*/' . $category->id) ? 'active' : '' }}">
                                            <a class="nav-link {{ request()->is('*/' . $category->id) ? 'active' : '' }}"
                                                href="{{ route('home.category', ($category->id ?? 0)) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                {{-- Games Content ========================================= --}}

                @yield('content')

                {{-- // Games Content ========================================= --}}

            </div>

            <div class="copyright py-4 text-center">
                <div class="container"> Gamebox © 2022. All rights reserved.</div>
            </div>
        </div>
    </div>
    <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="content">
                            <div class="error"></div>
                            <div class="form loginBox">
                                <form id="user_login" action="" accept-charset="UTF-8">
                                    <input id="u_number" class="form-control" type="number" placeholder="Phone"
                                        name="phone">
                                    <input id="u_password" class="form-control" type="password"
                                        placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="submit" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                            <div class="form">
                                <form id="user_register" method="" html="{:multipart=>true}" data-remote="true"
                                    action="" accept-charset="UTF-8">

                                    <input id="username" class="form-control" type="text" placeholder="Name"
                                        name="name">
                                    <input id="useremail" class="form-control" type="email" placeholder="Email"
                                        name="email">
                                    <input id="usernumber" class="form-control" type="number" placeholder="Phone"
                                        name="phone">
                                    <input id="userpassword" class="form-control" type="password"
                                        placeholder="Password" name="password">
                                    <input id="userpassword_confirmation" class="form-control" type="password"
                                        placeholder="Repeat Password" name="password_confirmation">
                                    <input class="btn btn-default btn-register" type="submit" value="Create account"
                                        name="commit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Looking to
                            <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                        <span>Already have an account?</span>
                        <a href="javascript: showLoginForm();">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/front_assets/dark-grid/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="/front_assets/dark-grid/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/front_assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/front_assets/dark-grid/js/script.js"></script>
    <script type="text/javascript" src="/front_assets/js/greedy-menu.js"></script>
    <script type="text/javascript" src="/front_assets/js/custom.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script type="text/javascript" src="/front_assets/dark-grid/js/custom.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#user_register').submit(function(e) {
                e.preventDefault();
                var name = $('#username').val();
                var email = $('#useremail').val();
                var phone = $('#usernumber').val();
                var password = $('#userpassword').val();
                var password_confirmation = $('#userpassword_confirmation').val();
                console.log(name);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: "post",
                    url: "{{ route('user-register') }}",
                    data: {
                        'name': name,
                        'email': email,
                        'phone': phone,
                        'password': password,
                        'password_confirmation': password_confirmation
                    },
                    success: function(response) {
                            $('#loginModal').hide();
                        console.log(response);
                    }
                });
            });
            $('#user_login').submit(function(e) {
                e.preventDefault();
                var phone = $('#u_number').val();
                var password = $('#u_password').val();
                console.log(name);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: "post",
                    url: "{{ route('user-login') }}",
                    data: {
                        'phone': phone,
                        'password': password,
                    },
                    success: function(response) {
$('#loginModal').closest('.modal').modal('toggle');
                        console.log(response);
                        if (response.errors) {
                            console.log("Error");

                        }
                    }
                });
            });
        });
    </script>

    @yield('scripts')

{{-- google_language --}}
@if(isset($google_lang))
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                includedLanguages: "ar,en"
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script>
        let changeLanguageBtn = document.querySelector('#changeLanguageBtn');
        let languageSelect;

	    setTimeout(function () {
			languageSelect = document.querySelector('#google_translate_element .goog-te-combo');
			if (languageSelect.value === 'en') {
                changeLanguageBtn.dataset.currentLanguage = 'en';
				changeLanguageBtn.textContent = 'العربية';
				document.querySelector('html').dir = 'ltr';
                document.querySelector('body').dir = 'ltr';
                let arrowIcons = document.querySelectorAll('.fa-arrow-right');
                arrowIcons.forEach((el) => {
                    el.classList.remove('fa-flip-horizontal');
                })
			} else if(languageSelect.value === 'ar') {
                changeLanguageBtn.dataset.currentLanguage = 'ar';
				changeLanguageBtn.textContent = 'English';
				document.querySelector('html').dir = 'rtl';
                document.querySelector('body').dir = 'rtl';
                let arrowIcons = document.querySelectorAll('.fa-arrow-right');
                arrowIcons.forEach((el) => {
                    el.classList.add('fa-flip-horizontal');
                })
			}
		}, 2000);
		

		changeLanguageBtn.addEventListener('click', (e) => {
			const self = e.target;
            
			if (!languageSelect) return;

            if (self.dataset.currentLanguage === 'en') {
                // Change language to arabic
                self.dataset.currentLanguage = 'ar';
                self.textContent = 'English';
                languageSelect.querySelector('[value="ar"]').selected = true;

                // Fire onchange event
                if ("createEvent" in document) {
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    languageSelect.dispatchEvent(evt);
                } else {
                    languageSelect.fireEvent("onchange");
                }

				document.querySelector('html').dir = 'rtl';
                document.querySelector('body').dir = 'rtl';
                let arrowIcons = document.querySelectorAll('.fa-arrow-right');
                arrowIcons.forEach((el) => {
                    el.classList.add('fa-flip-horizontal');
                })

            } else {
                // Change language to english
                self.dataset.currentLanguage = 'en';
                self.textContent = 'العربية';
                languageSelect.querySelector('[value="en"]').selected = true;

                // Fire onchange event
                if ("createEvent" in document) {
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    languageSelect.dispatchEvent(evt);
                } else {
                    languageSelect.fireEvent("onchange");
                }

				document.querySelector('html').dir = 'ltr';
                document.querySelector('body').dir = 'ltr';

                let arrowIcons = document.querySelectorAll('.fa-arrow-right');
                arrowIcons.forEach((el) => {
                    el.classList.remove('fa-flip-horizontal');
                })
			}
		}, false);
	</script>
@endif

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    @yield('scripts')

</body>

</html>
