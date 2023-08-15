@extends('layouts.dash-auth')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

<main class="content  ">
    <div class="px-5 pt-2">
        <div class="row mb-3">
            <div class="col-8">
                <div class="p-4 text-white bg-darks">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('uploads/users/'.$user->image)}}" class="ratio11 w-100" alt="">
                        </div>
                        <div class="col-8 align-self-center">
                            <h1 class=" text-warning">{{$user->first_name}} {{$user->last_name}} </h1>
                            <h2 class=" text-white">Randy Jabali</h2>
                            <a class="btn btn-bg" href="{{url('admin/screen/'.$user->id.'/'.$user->first_name.'/voting')}}">Votes</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 text-white bg-darks">
                @php
            $this_user = App\Models\Registration::where('user_id', $user->id)->first();

        @endphp
        @if ($this_user)

        @php
            $my_song = App\Models\Song::where('track_id', '=', $this_user->song_id)->first();

         @endphp
        @endif
        <a href="{{url('/video/'.$my_song->id.'/'.$my_song->name.$my_song->track_name)}}">
    <img src="{{ $my_song->image_url }}" class="ratio169 w-100" alt="">
    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none" style="position: absolute; bottom: 50%; left: 50%; transform: translate(-50%, -50%);">
  <g clip-path="url(#clip0_51_767)">
    <g filter="url(#filter0_d_51_767)">
      <path d="M17.8125 30.9375L30.9375 22.5L17.8125 14.0625V30.9375ZM22.5 41.25C19.9062 41.25 17.4688 40.7575 15.1875 39.7725C12.9063 38.7875 10.9219 37.4519 9.23438 35.7656C7.54688 34.0781 6.21125 32.0938 5.2275 29.8125C4.24375 27.5312 3.75125 25.0938 3.75 22.5C3.75 19.9062 4.2425 17.4688 5.2275 15.1875C6.2125 12.9063 7.54813 10.9219 9.23438 9.23438C10.9219 7.54688 12.9063 6.21125 15.1875 5.2275C17.4688 4.24375 19.9062 3.75125 22.5 3.75C25.0938 3.75 27.5312 4.2425 29.8125 5.2275C32.0938 6.2125 34.0781 7.54813 35.7656 9.23438C37.4531 10.9219 38.7894 12.9063 39.7744 15.1875C40.7594 17.4688 41.2513 19.9062 41.25 22.5C41.25 25.0938 40.7575 27.5312 39.7725 29.8125C38.7875 32.0938 37.4519 34.0781 35.7656 35.7656C34.0781 37.4531 32.0938 38.7894 29.8125 39.7744C27.5312 40.7594 25.0938 41.2513 22.5 41.25Z" fill="white"/>
    </g>
  </g>
  <defs>
    <filter id="filter0_d_51_767" x="-0.25" y="3.75" width="45.5" height="45.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      <feFlood flood-opacity="0" result="BackgroundImageFix"/>
      <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
      <feOffset dy="4"/>
      <feGaussianBlur stdDeviation="2"/>
      <feComposite in2="hardAlpha" operator="out"/>
      <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_51_767"/>
      <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_51_767" result="shape"/>
    </filter>
    <clipPath id="clip0_51_767">
      <rect width="45" height="45" fill="white"/>
    </clipPath>
  </defs>
</svg>
 </a>
<h3 class=" text-white mt-2">{{$my_song->name}}</h3>
                            <h5 class=" text-white">{{$my_song->artist}}</h5>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3 class="text-white">Queue</h3>
            <div class="card-body bg-darks">
            <table id="datatables- " class="table bg-darks" style="width:100%">
										<thead>
											<tr>
        <tr>
            <th>
                ID
            </th>
            <th>
                IMG
            </th>
            <th>SINGER NAME</th>
            <th>
                SONG
            </th>
            <th>
                ARTIST
            </th>
        </tr>
											</tr>
										</thead>
										<tbody>

                                        @php
                                            $reg = DB::table('registrations')->where('event_id', '=', $this_user->event_id)->take(3)->get();
                                       @endphp
                                        @foreach ($reg->slice(0, 7) as $item)
    <tr>
        <td>{{ $item->id }}</td>
        @php
            $user = App\Models\User::find($item->user_id);
        @endphp
        @if ($user)
            <td>
				<img src="{{asset('uploads/users/'.$user->image)}}"  height="40px" class="ratio11" style="object-fit: cover;" alt="">
		</td>
            <td>{{$user->first_name}} {{$user->last_name}}</td>
        @endif
        @php
            $song = App\Models\Song::where('track_id', '=', $item->song_id)->first();
        @endphp
        @if ($song)
            <td>{{$song->name}} </td>
            <td>{{$song->artist}} </td>
        @endif
    </tr>
        @endforeach
										</tfoot>
									</table>
								</div>
            </div>
            <div class="col-6">
                <h3 class="text-white">Leaderboard</h3>
            <div class="card-body bg-darks">
									<table id="datatables- " class="table bg-darks" style="width:100%">
										<thead>
											<tr>
        <tr>
            <th>
                ID
            </th>
            <th>
                IMG
            </th>
            <th>UserName</th>
            <th>
                Votes
            </th>
        </tr>
											</tr>
										</thead>
										<tbody>
                                        @php
                                            $voter = DB::table('votes')->where('event_id', '=', $this_user->event_id)->orderBy('votes', 'DESC')->take(3)->get();
                                       @endphp
                                        @foreach ($voter->slice(0, 7) as $item)
    <tr>
        <td>{{ $item->id }}</td>
        @php
            $user = App\Models\User::find($item->singer_id);
        @endphp
        @if ($user)
            <td>
				<img src="{{asset('uploads/users/'.$user->image)}}"  height="40px" class="ratio11" style="object-fit: cover;" alt="">
		</td>
            <td>{{$user->first_name}} {{$user->last_name}}</td>
        @endif
            <td>{{ number_format(($item->votes / $item->vote_count) * 10,1) }}%</td>
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

				</div>
			</main>

            @endsection

<style>
    .bg-darks{
        background: black ;
        color: white;
        border-radius: 7px;
    }
.table td, .table th {
    border-top: 1px solid #868686 !important;
}
    .table td  {
    padding: 2px 0.75rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
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
    body {
    position: relative;
    background-image: url(https://i.scdn.co/image/f05f2667aac2bbccd9bf8fcc658b647533257f16) !important;
    background-size: cover;
    background-attachment: fixed;
    height: auto;
}
</style>


