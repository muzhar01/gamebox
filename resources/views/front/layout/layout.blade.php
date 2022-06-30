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

</head>
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
							
							<li class="nav-item"> <a href="#myModal" class="nav-link" data-toggle="modal">Login</a> </li>
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

			<div id="carouselExampleControls" class="carousel slide m-4 h-auto" data-ride="carousel">
				<div class="carousel-inner">
					@foreach($sliders as $slider)
						<div class="carousel-item @if($loop->first) active @endif">
							<a href="{{ $slider->link }}">
								<img class="d-block w-100 h-auto" src="{{ '/storage/sliders/' . ($slider->banner ?? '') }}" alt="">
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

				@php
					$nav_categories = \App\Models\Admin\Category::active()->orderBy('title','asc')->take(8)->get() ?? [];
				@endphp
				
			<div class="nav-categories">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<nav class="">
								<ul class="nav">
									<li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">All Games</a></li>

									@foreach($nav_categories as $category)
										<li class="nav-item {{ request()->is('*/' . $category->title) ? 'active' : '' }}">
											<a class="nav-link {{ request()->is('*/' . $category->title) ? 'active' : '' }}" href="{{ route('home.category', $category->title) }}">{{ $category->title }}</a>
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
	<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<i class="fa fa-phone"></i>
						<input type="number" class="form-control" placeholder="Number" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>				
				
			</div>
		</div>
	</div>
</div> 
	<script type="text/javascript" src="/front_assets/dark-grid/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/front_assets/dark-grid/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/front_assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/front_assets/dark-grid/js/script.js"></script>
	<script type="text/javascript" src="/front_assets/js/greedy-menu.js"></script>
	{{-- <script type="text/javascript" src="/front_assets/dark-grid/js/custom.js"></script> --}}

	@yield('scripts')

</body>

</html>