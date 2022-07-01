<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gamebox | Play Games Online</title>
	<meta name="description" content="Play Games Online">
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/bootstrap.min.css">
	{{-- <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/jquery-comments.css"> --}}
	<link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/user.css">
	<link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/style.css">
	{{-- <link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/custom.css"> --}}
	<link rel="stylesheet" type="text/css" href="/front_assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="/front_assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="/front_assets/css/custom.css">
	<!-- Font Awesome icons (free version)-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>

		body{
			background-image: url('/front_assets/background/bg.png');
			background-repeat: no-repeat;
			background-size: cover;
			top: 0 !important;
		}
		.skiptranslate {
			display: none !important;
		}
	</style>

</head>

<body id="page-top">
<div id="google_translate_element" class="d-none"></div>
	<!-- Navigation-->
	<div class="container site-container">
		<div class="site-content">
			<nav class="navbar navbar-expand-lg navbar-dark top-nav" id="mainNav">
				<div class="container">
					<button class="navbar-toggler navbar-toggler-left collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
					<a class="navbar-brand js-scroll-trigger" href="/"><img src="{{ isset($logo) ? $logo : '/front_assets/logo.png' }}" class="site-logo" alt="Gamebox" style="height: 100px !important;"></a>
					<div class="navbar-collapse collapse justify-content-end" id="navb">
						<ul class="navbar-nav ml-auto text-uppercase">

						    <li class="nav-item"> <a class="nav-link" href="#" id="changeLanguageBtn" data-current-language="en" translate="no">العربية</a> </li>
							<li class="nav-item"> <a class="nav-link" href="#myModal">Login</a> </li>

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

			<div id="carouselExampleControls" class="carousel slide m-4" data-ride="carousel">
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
                        ->take(8)
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
                                            class="nav-item {{ request()->is('*/' . $category->title) ? 'active' : '' }}">
                                            <a class="nav-link {{ request()->is('*/' . $category->title) ? 'active' : '' }}"
                                                href="{{ route('home.category', $category->title) }}">{{ $category->title }}</a>
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
                        console.log(response);
                        if (response.errors) {
                            console.log("Error");

                        }
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
	<script type="text/javascript">
	function googleTranslateElementInit() {
	new google.translate.TranslateElement({includedLanguages: "ar,en"}, 'google_translate_element');
	}
	</script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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
                let arrowIcon = document.querySelector('.fa-arrow-right');
                arrowIcon.classList.remove('fa-flip-horizontal');
			} else {
                changeLanguageBtn.dataset.currentLanguage = 'ar';
				changeLanguageBtn.textContent = 'English';
				document.querySelector('html').dir = 'rtl';
                document.querySelector('body').dir = 'rtl';
                let arrowIcon = document.querySelector('.fa-arrow-right');
                arrowIcon.classList.add('fa-flip-horizontal');
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
				}
				else {
					languageSelect.fireEvent("onchange");
				}

				document.querySelector('html').dir = 'rtl';
                document.querySelector('body').dir = 'rtl';
                let arrowIcon = document.querySelector('.fa-arrow-right');
                arrowIcon.classList.add('fa-flip-horizontal');

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
				}
				else {
					languageSelect.fireEvent("onchange");
				}

				document.querySelector('html').dir = 'ltr';
                document.querySelector('body').dir = 'ltr';

                let arrowIcon = document.querySelector('.fa-arrow-right');
                arrowIcon.classList.remove('fa-flip-horizontal');
			}
		}, false);
	</script>

	@yield('scripts')

</body>

</html>
