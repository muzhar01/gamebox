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
	<!-- Font Awesome icons (free version)-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> </head>

<body id="page-top">
	<!-- Navigation-->
	<div class="container site-container">
		<div class="site-content">
			<nav class="navbar navbar-expand-lg navbar-dark top-nav" id="mainNav">
				<div class="container">
					<button class="navbar-toggler navbar-toggler-left collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
					<a class="navbar-brand js-scroll-trigger" href="/"><img src="{{ isset($logo) ? $logo : '/front_assets/logo.png' }}" class="site-logo" alt="Gamebox" style="height: 100px !important;"></a>
					<div class="navbar-collapse collapse justify-content-end" id="navb">
						<ul class="navbar-nav ml-auto text-uppercase">
							
							<li class="nav-item"> <a class="nav-link" href="/login">Login</a> </li>
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

				@php
					$nav_categories = \App\Models\Admin\Category::active()->orderBy('title','asc')->take(8)->get() ?? [];
				@endphp
				
			<div class="nav-categories">
				<div class="container">
					<nav class="greedy">
						<ul class="links list-categories">
							<a href="/">
								<li>All Games</li>
							</a>

							@foreach($nav_categories as $category)
								<a href="{{ route('home.category', $category->title) }}">
									<li>{{ $category->title }}</li>
								</a>	
							@endforeach
						</ul>
					</nav>
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
	<script type="text/javascript" src="/front_assets/dark-grid/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/front_assets/dark-grid/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/front_assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/front_assets/dark-grid/js/script.js"></script>
	{{-- <script type="text/javascript" src="/front_assets/dark-grid/js/custom.js"></script> --}}

	@yield('scripts')

</body>

</html>