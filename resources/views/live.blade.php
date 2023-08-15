@extends('layouts.frontend')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

<main class="content  ">
    <div class=" p-0">

    <div class="  shadow">
					<div class="plyr__video-embed" id="player">
					<iframe
						src="https://www.youtube.com/embed/CSK5eApRGwQ?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;autoplay=1&amp;muted=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
						allowfullscreen
						allowtransparency
						allow="autoplay"
                        >
                    </iframe>
					</div>
                </div>


@endsection

<style>
    .fixed-right{
    position: fixed;
    right: 0;
    bottom: 60px;
    display: block !important;
}
    .audio-player{
        display: none;
    }
	.fa {
    font-size: 18px !important;
}
.bg-black{
    background-color: black;
}
.bg-black .svg-inline--fa {
    width: 20px;
    height: 20px;
}
 .fixed-right .svg-inline--fa {
    width: 26px;
    height: 26px;
}
.bg-btn .svg-inline--fa.fa-w-16 {
    width: 25px;
    height: 25px;
}
	.bg-btn{
    padding: 15px;
    font-size: 23px;
    border-radius: 50%;
    position: relative;
    fill: #E90E66;
filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}
	@media (max-width:768px) {
		 .right-hook,
	.navbar{
        display: none !important;
    }
	.content{
		padding: 0 !important;
	}
	.plyr--video {
    overflow: hidden;
    height: 100vh;
}
	}
</style>
<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>


