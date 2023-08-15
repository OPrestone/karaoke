<nav class="sidebar sidebar-sticky">
    <div class="sidebar-content pt-3 p-2 js-simplebar" style="right:0 !important; left: auto">
    <div class="songs">
        <div class="col-12 mt-5">
            <h3>Top Songs</h3>
        </div>

        <div class="row">
            @foreach ($songs->slice(65, 6) as $item)
                @include('components._single_song_card')
            @endforeach
        </div> 
    </div>
    <div class="artists">
        <div class="col-12 mt-5">
            <h3>Top Artists</h3>
        </div>
        <div class="row mx-0">
            @foreach ($artists as $item)
                <div class="text-center col-3 mb-3">
                    <a href="{{ url('artist/'.$item->id.'/'.$item->name) }}">
                        <img src="{{ $item->image_url }}" class="ratio11 mb-2 w-100" style="object-fit: cover; border-radius: 50%" alt="">
                    </a>
                </div>
                <div class="col-9 align-self-center">
                    <a href="{{ url('artist/'.$item->id.'/'.$item->name) }}">
                    <h5>{{ $item->name }}</h5>
                    </a> 
                </div>
            @endforeach
        </div>
    </div>
    <style>
        #ytplayer{
            position: absolute;
            bottom: 50px;
        }
    </style>
<!-- <div id="ytplayer"></div>  -->

<div class="card p-2 shadow">
    <div class="plyr__video-embed" id="player">
        <!-- The player will be dynamically replaced with Plyr YouTube player -->
    </div>
</div>
</div> 
</nav>
