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
	<link href="{{asset('assets')}}/docs/css/style-dark.css" rel="stylesheet">

</head>

<body id="songListContainer">
	<div class="wrapper">

	 <div class="left-hook p-2">
		<div class="bg-dark"></div>
	 </div>

		<div class="mains ">
	@include('layouts.inc.navbar')





            @yield('content')

		</div>
	</div>

	@include('layouts.inc.right-bar')

	@include('components._audio_player')

<style>
table .sticky-top {
    top: 50px;
}

.hero .right .card-body {
    box-shadow: 7px 7px 0 0px #E90E66;
	background: transparent;
    padding: 0 20px 20px 0;
    border: none;
}
	.hero
	.card{
	padding: 0 10px 10px 0;
	background: transparent;
	border:none;
}
	.hero .left .card-body{
	box-shadow: -7px -7px 0 0px #E90E66;
	background: transparent;
	padding: 10px 0 0 10px;
	border:none;
}
body  {
  position: relative;
  background: url(https://img.freepik.com/free-photo/young-woman-singing-local-event_23-2149188110.jpg?w=826&t=st=1688548943~exp=1688549543~hmac=0806bf198cdbfe1d413789b59ddb7958a8c1b8b461641e98e9105f3fc96855a6) no-repeat center center;
  background-size: cover;
  background-attachment: fixed;
  height: auto;
}
.text-prime{
	color: #E90E66;
}
.card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem;
    background: #270a1ac2;
    margin: 20px;
}
body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background:#0d0029e0;
}
</style>
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
