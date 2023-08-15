@extends('layouts.frontend')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

<main class="content  ">

    <div class=" p-0">
@if (session('message'))
                <div  class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form class="mt-4 col-12" id="search-form" action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Search..." id="search-input">
    <button type="submit">Search</button>
</form>
<div class="row mx-0">
    <ul class="nav d-flex nav-pills mb-3 col-12 pb-2" id="pills-tab" role="tablist" style="overflow-x: scroll;
    flex-flow: row;">
  <li class="nav-item">
    <a class="nav-link active" id="pills-events-tab" data-toggle="pill" href="#pills-events" role="tab" aria-controls="pills-events" aria-selected="true">events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-songs-tab" data-toggle="pill" href="#pills-songs" role="tab" aria-controls="pills-songs" aria-selected="false">Songs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-videos-tab" data-toggle="pill" href="#pills-videos" role="tab" aria-controls="pills-videos" aria-selected="false">Videos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-artists-tab" data-toggle="pill" href="#pills-artists" role="tab" aria-controls="pills-artists" aria-selected="false">Artists</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="false">Users</a>
  </li>
</ul>
</div>
<div class="tab-content mb-5" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab">

  <h4 class="titles px-2 px-md-0 mt-3">Upcoming Events</h4>
       <div class="row videos">
       @foreach ($events->slice(0, 514) as $item)
        <div class="col-6 justify-content-between mb-2 d-md-none">
            <div class="">
                <a class="text-light" href="{{url('event/'.$item->id.'/register')}}">
                <div class= "playing song-row">
                    <img src="{{asset('uploads/events/'.$item->image)}}"  class="ratio12 mr-2 w-100" style="object-fit: cover;" alt="">
                 </div>

                <div>
                                         {{$item->name}}
                                </div>
                                    </a>
</div>
        </div>
        @endforeach
       </div>

  </div>
  <div class="tab-pane fade" id="pills-songs" role="tabpanel" aria-labelledby="pills-songs-tab">
    <h4 class="titles px-2 px-md-0 mt-3">All Songs</h4>
        @foreach ($songs->slice(8, 514) as $item)
        <div class="d-flex col-12 justify-content-between mb-2 d-md-none">
            <div class="d-flex">
                <div class= "playing song-row">
                    <img src="{{$item->image_url }}" height="35" class="ratio11 mr-2" style="object-fit: cover;" alt="">
                    <a class="ply" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i></a>
                </div>

                <div> <a class="text-light" href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                         {{$item->name}}{{$item->track_name}}
                                    </a>  <small class="d-flex justify-content-between"><div href="">{{$item->artist}}</div> </small></div>
                                            </div>
            <div class="">
                <a class="text-white btn btn-bg" href=""> Lyrics</a>
             </div>
        </div>
        @endforeach
    </div>
  <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">

  <h4 class="titles px-2 px-md-0 mt-3">All videos</h4>
       <div class="row videos">
       @foreach ($videos->slice(0, 514) as $item)
        <div class="col-6 justify-content-between mb-2 d-md-none">
            <div class="">
                <div class= "playing song-row">
                    <img src="{{asset('uploads/videos/'.$item->image)}}"  class="ratio12 mr-2 w-100" style="object-fit: cover;" alt="">
                    <a class="ply text-white" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i> {{$item->id}}K</a>
                </div>

                <div> <a class="text-light" href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                         {{$item->name}}
                                    </a> {{$item->user->name}}
                                </div>
</div>
        </div>
        @endforeach
       </div>

  </div>
  <div class="tab-pane fade" id="pills-artists" role="tabpanel" aria-labelledby="pills-artists-tab">
    <h3 class="titles">All Artists</h3>
        <div class="row w-100">
            @foreach ($artists as $item)
            <div class="text-center col-4 my-2">
  <a href="{{url('artist/'.$item->id.'/'.$item->name)}}">
<img src="{{$item->image_url }}"     class="ratio11 mb-2 w-100" style="object-fit: cover; border-radius:50%" alt="">
<h5>{{$item->name}}</h5>
</a>
</div>
            @endforeach
        </div>
    </div>
  <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">

  <h3 class="titles">All users</h3>
        <div class="row w-100">
            @foreach ($users as $item)
            <div class="text-center col-4 my-2">
  <a href="{{url('artist/'.$item->id.'/'.$item->name)}}">
<img src="{{asset('uploads/users/'.$item->image)}}"     class="ratio11 mb-2 w-100" style="object-fit: cover; border-radius:50%" alt="">
<h5>{{$item->first_name}}</h5>
</a>
</div>
            @endforeach
  </div>
</div>



@endsection

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
