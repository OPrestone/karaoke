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
@if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                @endif
<div class="my-4 border-0 text-white row">
    <div class="col-md-3 col-6">
            <img src="{{asset('uploads/events/'.$event->image)}}" class="w-100 ratio12" style="object-position: center; object-fit: cover" alt="...">

    </div>
    <div class="col-6 col-md-9 align-self-center">
        <h1 class="mb-1 big-txt"> {{$event->name}} </h1>
        <p class="mb-1"><b>Location:</b> {{$event->location}} </p>
        <p class="mb-1"><b>Date:</b> {{$event->date}} </p>
        <p class="mb-1"><b>Prize:</b> {{$event->prize}} </p>
        <p class="mb-1"><b>Host:</b> {{$event->host}} </p>
        <br>
        <a class="btn btn-bg mt-4" href="{{url('vote/'.$event->id)}}">Vote </a>
        <div class="mt-3 d-none d-md-block">
            <h4><b>Description</b></h4>
            <p class="mb-0">{{$event->description}} </p>
        </div>
        <div class="mt-3 col-12 d-md-none">
        </div>
    </div>
        <div class="mt-3 col-12 d-md-none">
            <h4><b>Description</b></h4>
            <p class="mb-0">{{$event->description}} </p>
        </div>
</div>
    <div class=" p-md-0">
        <div id="songsss">
        <h3 class="titles px-2 px-md-0">Pick a Song For The {{$event->name}} Event</h3>
        </div>

             @foreach ($songs->slice(4, 514) as $item)
        <div class="d-flex col-12 justify-content-between mb-2 d-md-none">
            <div class="d-flex">
                <div class= "playing song-row">
                    <img src="{{$item->image_url }}" height="35" class="ratio11 mr-2" style="object-fit: cover;" alt="">
                    <a class="ply" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i></a>
                </div>
                <div>{{$item->name}}{{$item->track_name}} <br> <small class="d-flex justify-content-between"><div href="">{{$item->artist}}</div> </small></div>
            </div>
            <div class="">
                <!-- <a class="text-white" href=""><i class="fa fa-ellipsis-v"></i>
            </a> -->
            <div class="ml-auto text-right align-self-center">
            <form action="{{url('event/'.$event->id.'/register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="song_id" value="{{$item->track_id}}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit"  class="btn btn-bg w-100">Register</button>
</form>
                                </div>
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
        <td>
        <div class="ml-auto text-right align-self-center">
            <form action="{{url('event/'.$event->id.'/register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="song_id" value="{{$item->id}}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit"  class="btn btn-danger w-100">Register with song</button>
</form>
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
