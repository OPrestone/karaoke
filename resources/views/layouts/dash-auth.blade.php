<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin Template">
	<meta name="author" content="Bootlab">

	<title>Karaoke Nation</title>

	<link href="{{asset('assets')}}/docs/css/app.css" rel="stylesheet">
	<link href="{{asset('assets')}}/docs/css/style.css" rel="stylesheet">
@yield('header')
</head>

<body>
     <div class="overlay">
            @yield('content')

	 </div>


	<script src="{{asset('assets')}}/docs/js/app.js"></script>
	@yield('footer')
</body>

</html>
