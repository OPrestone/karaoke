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

<style>
	.right-hook .sidebar-content{
		right: 0 ;
		width: 20vw;
		max-width: 300px;
    left: auto;
	}
	.center {
		margin:auto !important;
	}
	 .left-hook .sidebar-content{
		right:auto !important; left: 0 ;

		width: 20vw;
		max-width: 300px;
	}
	.left-hook .sidebar-content{
		background: black;
	}
</style>
<body id="songListContainer">
	@include('layouts.inc.navbar')
	<div class="wrapper">


	@include('layouts.inc.sidebar')

		<div class="main ">





            @yield('content')

		</div>
		</div>
<div class="right-hook p-2" style="height: 100vh">

@include('layouts.inc.right-bar')
</div>
	</div>
	@include('components._audio_player')

    <div class="fixed-bottom bg-black d-md-none">
					<nav class="d-flex justify-content-around pt-2">
					<div class="text-center"><a href="{{url('/')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
  <path d="M10.4167 20.8333V14.5833H14.5833V20.8333H19.7917V12.5H22.9167L12.5 3.125L2.08334 12.5H5.20834V20.8333H10.4167Z" fill="white"/>
</svg> <br> Home</a></div>
					<div class="text-center"><a href="{{url('/events')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M3 22V4H6V2H8V4H16V2H18V4H21V12H19V10H5V20H12V22H3ZM19 24C17.7833 24 16.7207 23.621 15.812 22.863C14.9033 22.105 14.3327 21.1507 14.1 20H15.65C15.8667 20.7333 16.2793 21.3333 16.888 21.8C17.4967 22.2667 18.2007 22.5 19 22.5C19.9667 22.5 20.7917 22.1583 21.475 21.475C22.1583 20.7917 22.5 19.9667 22.5 19C22.5 18.0333 22.1583 17.2083 21.475 16.525C20.7917 15.8417 19.9667 15.5 19 15.5C18.5167 15.5 18.0667 15.5873 17.65 15.762C17.2333 15.9367 16.8667 16.1827 16.55 16.5H18V18H14V14H15.5V15.425C15.95 14.9917 16.475 14.6457 17.075 14.387C17.675 14.1283 18.3167 13.9993 19 14C20.3833 14 21.5627 14.4877 22.538 15.463C23.5133 16.4383 24.0007 17.6173 24 19C24 20.3833 23.5123 21.5627 22.537 22.538C21.5617 23.5133 20.3827 24.0007 19 24Z" fill="white"/>
</svg> <br> Events</a></div>
					<div class="text-center pb-2"><a href="{{url('/songs')}}"> <span class="bg-btn"><i class="fa fa-music"></i></span></a></div>
					<div class="text-center"><a href="{{url('/videos')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M4 8H2V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H16V20H4V8Z" fill="white"/>
  <path d="M20 2H8C7.46957 2 6.96086 2.21071 6.58579 2.58579C6.21071 2.96086 6 3.46957 6 4V16C6 16.5304 6.21071 17.0391 6.58579 17.4142C6.96086 17.7893 7.46957 18 8 18H20C20.5304 18 21.0391 17.7893 21.4142 17.4142C21.7893 17.0391 22 16.5304 22 16V4C22 3.46957 21.7893 2.96086 21.4142 2.58579C21.0391 2.21071 20.5304 2 20 2ZM11 14V6L18 10L11 14Z" fill="white"/>
</svg> <br> Videos</a></div>
					<div class="text-center">
@if (Auth::check())
    <?php
    // User is authenticated
    $userId = Auth::user()->id;
    $userName = Auth::user()->first_name;
    $profileUrl = url('/my-profile/' . $userId . '/' . $userName);
    ?>
    <a href="{{ $profileUrl }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
  <path d="M12 19.2C9.5 19.2 7.29 17.92 6 16C6.03 14 10 12.9 12 12.9C14 12.9 17.97 14 18 16C17.3389 16.9844 16.4459 17.7912 15.3996 18.3492C14.3533 18.9072 13.1858 19.1994 12 19.2ZM12 5C12.7956 5 13.5587 5.31607 14.1213 5.87868C14.6839 6.44129 15 7.20435 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11C11.2044 11 10.4413 10.6839 9.87868 10.1213C9.31607 9.55871 9 8.79565 9 8C9 7.20435 9.31607 6.44129 9.87868 5.87868C10.4413 5.31607 11.2044 5 12 5ZM12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 6.47 17.5 2 12 2Z" fill="white"/>
</svg> <br> Profile</a>
@else
    <!-- User is not authenticated, show login link or button -->
    <a href="{{url('/my-profile/')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
  <path d="M12 19.2C9.5 19.2 7.29 17.92 6 16C6.03 14 10 12.9 12 12.9C14 12.9 17.97 14 18 16C17.3389 16.9844 16.4459 17.7912 15.3996 18.3492C14.3533 18.9072 13.1858 19.1994 12 19.2ZM12 5C12.7956 5 13.5587 5.31607 14.1213 5.87868C14.6839 6.44129 15 7.20435 15 8C15 8.79565 14.6839 9.55871 14.1213 10.1213C13.5587 10.6839 12.7956 11 12 11C11.2044 11 10.4413 10.6839 9.87868 10.1213C9.31607 9.55871 9 8.79565 9 8C9 7.20435 9.31607 6.44129 9.87868 5.87868C10.4413 5.31607 11.2044 5 12 5ZM12 2C10.6868 2 9.38642 2.25866 8.17317 2.7612C6.95991 3.26375 5.85752 4.00035 4.92893 4.92893C3.05357 6.8043 2 9.34784 2 12C2 14.6522 3.05357 17.1957 4.92893 19.0711C5.85752 19.9997 6.95991 20.7362 8.17317 21.2388C9.38642 21.7413 10.6868 22 12 22C14.6522 22 17.1957 20.9464 19.0711 19.0711C20.9464 17.1957 22 14.6522 22 12C22 6.47 17.5 2 12 2Z" fill="white"/>
</svg> <br> Profile</a>
@endif

</div>

					</nav>
				</div>


				<div class="fixed-top p-2 bg-black d-md-none">
					<nav class="d-flex justify-content-around">
					<div class="text-center"><h6>  Trending  </h6></div>
					<div class="text-center"><h6>  |  </h6></div>
					<div class="text-center"><h6> <a href="{{url('/live')}}">Live</a>  </h6></div>
					<div class="text-center"><h6>  |  </h6></div>
					<div class="text-center"><h6>  Latest</h6></div>
					<div class="text-center"><h6>  |  </h6></div>
					<div class="text-center"><h6>  For You</h6></div>
					<div class="text-center"><h6> <a href="{{url('/all-search')}}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
  <path d="M19.375 17.5H18.3875L18.0375 17.1625C18.8187 16.255 19.3896 15.186 19.7094 14.032C20.0293 12.8781 20.0901 11.6677 19.8875 10.4875C19.3 7.0125 16.4 4.2375 12.9 3.8125C11.6695 3.65683 10.4197 3.78471 9.24628 4.18636C8.07283 4.58801 7.0068 5.25277 6.12979 6.12979C5.25277 7.0068 4.58801 8.07283 4.18636 9.24628C3.78471 10.4197 3.65683 11.6695 3.8125 12.9C4.2375 16.4 7.0125 19.3 10.4875 19.8875C11.6677 20.0901 12.8781 20.0293 14.032 19.7094C15.186 19.3896 16.255 18.8187 17.1625 18.0375L17.5 18.3875V19.375L22.8125 24.6875C23.325 25.2 24.1625 25.2 24.675 24.6875C25.1875 24.175 25.1875 23.3375 24.675 22.825L19.375 17.5ZM11.875 17.5C8.7625 17.5 6.25 14.9875 6.25 11.875C6.25 8.7625 8.7625 6.25 11.875 6.25C14.9875 6.25 17.5 8.7625 17.5 11.875C17.5 14.9875 14.9875 17.5 11.875 17.5Z" fill="white"/>
</svg></a></h6></div>

					</nav>
				</div>

<div class="fixed-right p-2 d-none">
    <nav class="d-block">
					<div class="text-center p-1"><h6><i class="fa fa-heart"></i> <br> 566</h6></div>
					<div class="text-center p-1"><h6><i class="fa fa-envelope"></i> <br> 22</h6></div>
					<div class="text-center p-1"><h6><i class="fa fa-inbox"></i> <br> 70%</h6></div>
					<div class="text-center p-1"><h6><i class="fa fa-share"></i> <br> 89</h6></div>

    </nav>
</div>

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
