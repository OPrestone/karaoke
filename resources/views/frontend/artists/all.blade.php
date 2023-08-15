
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
					<h1 class="h3 mb-3">All artists</h1>
                    <a href="{{url('/artists')}}" type="submit" class="btn btn-lg btn-dark px-4">Add artist</a>
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
                                                    <th>artist Name</th> 
                                                    <th>
                                                    popularity
                                                    </th>
                                                    <th>Action</th> 
                                                </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($artists as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>            
				<img src="{{$item->image_url }}"  width="50px" height="50px" style="object-fit: cover;" alt=""> 
		</td>
            <td>{{$item->name}}</td>  
        
            <td>{{$item->popularity}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('admin/artist/'.$item->id.'/'.$item->name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('admin/event/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1">
                    <i class="fa fa-pen"></i>
                </a>   
                 
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