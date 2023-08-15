
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
					<h1 class="h3 mb-3">All Songs</h1>
                    <a href="{{url('/songs')}}" type="submit" class="btn btn-lg btn-dark px-4">Add Song</a>
					</div>

 					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Default</h5>
									<h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table.</h6>
								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead>
											<tr>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        IMG
                                                    </th>
                                                    <th>Song Name</th>
                                                    <th>artist</th>
                                                    <th>album</th>
                                                    <th>duration_ms</th>
                                                    <th>release_date</th>
                                                    <th>
                                                    popularity
                                                    </th>
                                                    <th>Action</th> 
                                                </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($songs as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>            
				<img src="{{$item->image_url }}"  width="50px" height="50px" style="object-fit: cover;" alt=""> 
		</td>
            <td>{{$item->name}}{{$item->track_name}}</td>
            <td>{{$item->artist}}</td>
            <td>{{$item->album}}</td>
            <td>{{$item->duration_ms}}</td> 
            <td>{{$item->release_date}}</td>
        
            <td>{{$item->popularity}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('admin/profile/'.$item->id.'/'.$item->name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('admin/event/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1">
                    <i class="fa fa-pen"></i>
                </a>
                <button type="button" class="btn btn-info shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#audioModal{{$item->id}}">
                    <i class="fa fa-play"></i>
                </button>
                <button type="button" class="btn btn-dark shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                    <i class="fa fa-video"></i>
                </button>
                <!-- Video Modal -->
                <div class="modal fade" id="audioModal{{$item->id}}" tabindex="-1" aria-labelledby="audioModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="audioModalLabel{{$item->id}}">Are You Sure You want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="plyr__video-embed">
                <audio id="player" controls>
  <source src="{!! $item->preview_url !!}" type="audio/mp3" />
  <source src="{!! $item->preview_url !!}" type="audio/ogg" />
</audio> 
               </div>
           </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-primary" href="{{url('admin/delete-event/'.$item->id)}}">Delete</a>
           </div>
       </div>
   </div>
</div>
                <!-- Audio Modal -->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Are You Sure You want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="plyr__video-embed">
                    <iframe id="youtube-iframe-{{$item->id}}"
                        src="https://www.youtube.com/embed/{!! $item->karaokevid !!}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
               </div>
           </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-primary" href="{{url('admin/delete-event/'.$item->id)}}">Delete</a>
           </div>
       </div>
   </div>
</div>


            </div>    
        </td>
            

        </tr>
        @endforeach
										</tfoot>
									</table>
								</div>
							</div>
						</div>
 
					</div>

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
        $('#exampleModal{{$item->id}}').on('hidden.bs.modal', function() {
            var player = document.getElementById('youtube-iframe-{{$item->id}}');
            stopYouTubeVideo(player);
        });
    });
    
</script>

				</div>
			</main>

            @endsection