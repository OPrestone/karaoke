
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0"> 
 
                        <div class="shadow pt-2 bg-white p-3">
                            <div class="row">
                                <div class="col-12 col-md-10">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{!!$artist->image_url!!}" class="ratio11 w-100" style="object-fit: cover;" alt="">
                                        </div>
                                        <div class="col-9">
                                            <h1 class="mb-1"><b> {{$artist->name}}</b> </h1>
                                            <p class="mb-1"><b>Popularity:</b> {{$artist->popularity}} </p>
                                            <p class="mb-1"><b>Genres:</b> {{$artist->genres}} </p> 
                                            <div class="mt-3">
                                                <h4><b>Bio</b></h4>
                                                <p class="mb-0">{{$artist->bio}} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
 

                        <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                <h4 class="card-title">Songs By {{$artist->name}}</h4> 
 								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead> 
        <tr>
            <th> ID </th>
            <th> IMG </th>
            <th>Song</th>
            <th>Artist</th>
            <th>Genres</th>  
        </tr> 
										</thead>
										<tbody>


                                        @foreach ($songs as $item)
  <tr class="song-row" data-src="{{ $item->preview_url }}">
    <td>{{ $item->id }}</td>
    <td><img src="{!! $item->image_url !!}" width="50px" height="50px" style="object-fit: cover;" alt=""></td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->artist }}</td>
    <td>{{ $item->genres }}</td>
  </tr>
@endforeach

										</tfoot>
									</table>
								</div>
							</div>
						</div>
 
					</div> 
				</div>
			</main>
            @include('components._audio_player') 

            <script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								buttons: ["copy", "print"],
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>
<script>
    function stopYouTubeVideo(player) {
        var youtubePlayer = new YT.Player(player);

        // Stop the video playback
        youtubePlayer.stopVideo();
    }

    $(document).ready(function() {
        $('#exampleModal{{$item ?? ''->id}}').on('hidden.bs.modal', function() {
            var player = document.getElementById('youtube-iframe-{{$item ?? ''->id}}');
            stopYouTubeVideo(player);
        });
    });
    
</script>
            @endsection 