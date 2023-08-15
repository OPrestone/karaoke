@extends('layouts.frontend')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')
<style>
    .songs{
        display: none;
    }
    body {
    position: relative;
    background: url({!!$artist->image_url!!}) no-repeat center center !important;
    background-size: cover !important;
    background-attachment: fixed;
    background-position: top;
    height: top !important;
    min-height: 100vh;
}
.big-txt {
    font-size: 51px;
    line-height: 1.2;
}
body::before, .card {
    background: #000000ed;
}
.card-img-overlay {
    position: absolute;
    top: auto !important;
    right: 0;
    bottom: 0;
    margin: 0 !important;
    left: 0;
    padding: 1.25rem;
    border-radius: 0;
    background: linear-gradient(180deg,transparent,#0000009c,#000000db,#000000,#000000) !important;
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
@media (min-width:768px) {
    .main {
    width: 67%;
    min-height: 100vh;
    transition: all .4s ease-in-out;
}
}
@media (max-width:768px) {
.big-txt {
    font-size: 35px !important;
    font-weight: 900;
    line-height: 1.2;
}
.fixed-top.p-2.bg-black.d-md-none{
    display: none;
}
}
</style>

<main class=" ">
<div class="card text-bg-dark d-md-none w-100">
<img src="{!!$artist->image_url!!}" class="w-100 ratio169" style="object-position: center; object-fit: cover" alt="...">
  <div class="card-img-overlay">
  <h1 class="mb-1 big-txt text-center"> {{$artist->name}} </h1>
  </div>
</div>
    <div class="mt-4 container">
    <div class="d-none d-md-block">
    <div class="mb-5 border-0 text-white row mx-0">
    <div class="col-3">
            <img src="{!!$artist->image_url!!}" class="w-100 ratio11" style="object-position: center; border-radius: 50%; object-fit: cover" alt="...">

    </div>
    <div class="col-9 align-self-center">
        <h1 class="mb-1 big-txt"> {{$artist->name}} </h1>
        <p class="mb-1"><b>Popularity:</b> {{$artist->popularity}} </p>
        <p class="mb-1"><b>Genres:</b> {{$artist->genres}} </p>
        <div class="mt-3">
            <h4><b>Bio</b></h4>
            <p class="mb-0">{{$artist->bio}} </p>
        </div>
    </div>
    </div>
    </div>

        <h3 class="titles">{{$artist->name}}'s Trending Songs</h3>

        <div class="d-flex w-100 g-2" style="overflow-x:scroll">
            @foreach ($songs->slice(0, 6) as $item)
            @include('components.image_square_card')
            @endforeach
        </div>

        <h3 class="titles">More {{$artist->name}} Songs</h3>
        @foreach ($songs->slice(0, 10) as $item)
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
        <div class="d-md-none py-4">.</div>
        <div class="row d-md-block d-none">
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
<!-- HTML with Plyr YouTube player -->

<script>
    // Function to load and play the related YouTube video using Plyr YouTube player
    function playRelatedVideo(artist, trackName) {
        getRelatedYouTubeVideoId(artist, trackName);
    }

    // Function to get the related YouTube video ID for the song
    function getRelatedYouTubeVideoId(artist, trackName) {
        var searchQuery = artist + ' ' + trackName + ' lyrics' + ' karaoke';
        var apiKey = 'AIzaSyDhYtxqb2X1t1fyZ177aAfjAv5zgCLsfiI'; // Replace with your actual API key

        // Make a request to the YouTube Data API v3 to search for the video
        fetch(
            `https://www.googleapis.com/youtube/v3/search?part=id&q=${searchQuery}&maxResults=1&type=video&videoEmbeddable=true&key=${apiKey}`
        )
            .then((response) => response.json())
            .then((data) => {
                if (data.items && data.items.length > 0) {
                    var videoId = data.items[0].id.videoId;
                    // Replace the iframe with Plyr YouTube player
                    var playerContainer = document.getElementById('player');
                    playerContainer.innerHTML = `<iframe
                        src="https://www.youtube.com/embed/${videoId}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;autoplay=1&amp;muted=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>`;
                    // Initialize the Plyr YouTube player
                    var player = new Plyr('#player iframe');
                } else {
                    // Video not found for the song
                    alert('YouTube video not found for the song.');
                }
            })
            .catch((error) => {
                console.error('Error fetching YouTube video:', error);
            });
    }
</script>
<!-- <script>
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
</script> -->
           </div>
       </div>
   </div>
</div></td>
        <td>
        <div class="ml-auto text-right align-self-center">
                                    <a href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}" type="submit" class="btn btn-danger btn-sm">Lyrics</a>
                                </div>
        </td>


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
