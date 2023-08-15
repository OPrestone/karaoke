@extends('layouts.frontend')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')
<style>
    .songs{
        display: none;
    }
.big-txt {
    font-size: 51px;
    line-height: 1.2;
}

.big-txt {
    background: url(https://www.standardmedia.co.ke/ktnplus/assets/img/texure.jpg);
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent !important;
    font-size: 50px;
    font-weight: 900;
    line-height: 1.2;
}
        /* .audio-player{
                display: block;
            } */

</style>

<main class="content  ">
    <div class=" p-md-0">
    <h4 class="titles px-2 px-md-0">Trending</h4>
        <div class="d-flex w-100" style="overflow-x:scroll">
            @foreach ($songs->slice(0, 8) as $item)
            @include('components.image_square_card')

            @endforeach
        </div>

        <h4 class="titles px-2 px-md-0 mt-3">All Songs</h4>
        @foreach ($songs->slice(8, 514) as $item)
        <div class="d-flex col-12 justify-content-between mb-2 d-md-none">
            <div class="d-flex">
                <div class= "playing song-row" data-src="{{ $item->preview_url }}">
                    <img src="{{$item->image_url }}" height="35" class="ratio11 mr-2" style="object-fit: cover;" alt="">
                    <a class="ply"><i class="fa fa-play"></i></a>
                </div>

                <div> <a class="text-light" href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                         {{$item->name}}{{$item->track_name}}
                                    </a>  <small class="d-flex justify-content-between"><div href="">{{$item->artist}}</div> </small></div>
                                            </div>
            <div class="">
                <a class="text-white btn btn-bg" href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}"> Lyrics</a>
             </div>
        </div>
        @endforeach
        <div class="row d-none d-md-block">
						<div class="col-12">
									<table id="datatables-buttons" class="table" style="width:100%">
										<thead class="sticky-top" style="background: #110424;">
											<tr>
                                                <tr> <th></th>
                                                    <th>
                                                        IMG
                                                    </th>
                                                    <th>Song Name</th>
                                                    <th>Artist</th>
                                                    <th>Album</th>
                                                    <th>
                                                    Duration
                                                    </th>
                                                    <th>
                                                    Play video
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($songs->slice(4, 514) as $item)

             <td class="song-row" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i></td>
            <td>
				<img src="{{$item->image_url }}"   height="40" class="ratio11" style="object-fit: cover;" alt="">
		</td>
            <td>{{$item->name}}{{$item->track_name}}</td>
            <td>{{$item->artist}}</td>
            <td>{{$item->album}}</td>
            <td> {{ gmdate('i:s', $item->duration_ms / 1000) }}</td>

            <td>
                <button type="button" class="btn btn-dark shadow btn-xs sharp mr-1" onclick="playRelatedVideo('{{ $item->artist }}', '{{ $item->name . $item->track_name }}')">
                    <i class="fa fa-video"></i>
                </button>
                <!-- Video Modal -->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-body">

<!-- Add this script tag to your HTML -->
<script src="https://www.youtube.com/iframe_api"></script>

<script>
    // Declare the player variable without const
    var player;

    // Function to initialize and load the YouTube player
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('ytplayer', {
            height: '150',
            width: '250',
            playerVars: {
                autoplay: 0,
                controls: 0,
                fs: 1,
                iv_load_policy: 3,
                loop: 1,
                related: 0,
                modestbranding: 1,
                rel: 0
            },
            videoId: '', // The video ID will be set later
            events: {
                'onReady': onPlayerReady,
            },
        });
    }

    // Function to handle the player ready event
    function onPlayerReady(event) {
        // You can do something here when the player is ready
    }

    // Function to get the related YouTube video ID for the song
    function getRelatedYouTubeVideoId(artist, trackName) {
        var searchQuery = artist + ' ' + trackName + ' lyrics' + ' karaoke' ;
        var apiKey = 'AIzaSyDhYtxqb2X1t1fyZ177aAfjAv5zgCLsfiI'; // Replace with your actual API key

        // Make a request to the YouTube Data API v3 to search for the video
        fetch(
            `https://www.googleapis.com/youtube/v3/search?part=id&q=${searchQuery}&maxResults=1&type=video&videoEmbeddable=true&key=${apiKey}`
        )
            .then((response) => response.json())
            .then((data) => {
                if (data.items && data.items.length > 0) {
                    var videoId = data.items[0].id.videoId;
                    // Set the video ID to the YouTube player
                    player.loadVideoById(videoId);
                } else {
                    // Video not found for the song
                    alert('YouTube video not found for the song.');
                }
            })
            .catch((error) => {
                console.error('Error fetching YouTube video:', error);
            });
    }


    function playRelatedVideo(artist, trackName) {
        getRelatedYouTubeVideoId(artist, trackName);
    }
</script>
           </div>
       </div>
   </div>
</div></td>

        </tr>
        @endforeach
										</tfoot>
									</table>
								</div>

								</div>



<script>
    document.addEventListener("DOMContentLoaded", function (event) {
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

@endsection
