<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ isset($game) && $game->title ? $game->title : 'Online Game' }} | Gamebox</title>
	<meta name="description" content="{{ isset($game) && $game->description ? $game->description : 'Play Games Online' }}">

	<link rel="stylesheet" type="text/css" href="/front_assets/dark-grid/style/bootstrap.min.css">
	<!-- Font Awesome icons (free version)-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> </head>

<body>
	<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <iframe src="{{ isset($game) && $game->start_path ? $game->start_path : '/' }}" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
                    Your browser doesn't support iframes
                </iframe>
            </div>
        </div>
	</div>
</body>
</html>