<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin Template">
	<meta name="author" content="Bootlab">

	<title>Karaoke Nation</title>

	<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
	<link href="{{asset('assets/docs/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets')}}/docs/css/style.css" rel="stylesheet">
<style>
    body,.content {
    position: relative;
background: white;
}
    body::before {
    position: relative;
}
</style>
</head>

<body id="songListContainer">
	<div class="wrapper">


	@include('layouts.inc.admin-sidebar')

		<div class="main ">
	@include('layouts.inc.admin-navbar')





            @yield('content')

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								&copy; <a href="index.html" class="text-muted">Karaoke Nation</a>
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">About us</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Contact</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms & Conditions</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	@include('layouts.inc.admin-sidebar')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{asset('assets')}}/docs/js/app.js"></script>
 			<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script> 

<script>
    $(document).ready(function() {
    $('#searchInput').keyup(function() {
        var value = $(this).val().toLowerCase();
        $('#songListContainer .song-card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        $('#songListContainer .song-cards').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

  const player = new Plyr('#player');
</script>
</body>

</html>
