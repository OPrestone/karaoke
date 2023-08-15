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

    .text-dark h4,.text-dark h5{
        color: black;
    }
    .slider-value{
        font-size: 70px;
        font-weight: 900;
        color: black;
    }
    .slider-container {
      text-align: center;
    }

    /* Style the range slider track with a gradient */
    .slider-container  input[type="range"] {
      -webkit-appearance: none;
      width: 100%;
      height: 11px;
      border-radius: 5px;
      background: linear-gradient(to right, red, orange, green);
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }

    /* Change the appearance of the slider thumb/handle */
    .slider-container input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
    }

    /* Change the appearance of the slider thumb/handle on hover */
    .slider-container  input[type="range"]:hover::-webkit-slider-thumb {
      background: #008CBA;
    }

    /* Change the appearance of the slider thumb/handle when active (being clicked) */
    .slider-container  input[type="range"]:active::-webkit-slider-thumb {
      background: #ff0000;
    }
    .modal .fixed-bottom{
        display: block !important;
    }
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
<div class="mb-4 border-0 text-white row">
    <div class="col-3">
            <img src="{{asset('uploads/events/'.$event->image)}}" class="w-100 ratio12" style="object-position: center; object-fit: cover" alt="...">

    </div>
    <div class="col-9 align-self-center">
        <h1 class="mb-1 big-txt"> {{$event->name}}  </h1>
        <p class="mb-1"><b>Location:</b> {{$event->location}} </p>
        <p class="mb-1"><b>Date:</b> {{$event->date}} </p>
        <p class="mb-1"><b>Prize:</b> {{$event->prize}} </p>
        <p class="mb-1"><b>Host:</b> {{$event->host}} </p>
        <div class="mt-3">
            <h4><b>Description</b></h4>
            <p class="mb-0">{{$event->description}} </p>
        </div>
    </div>
</div>
    <div class="p-0">
        <h3 class="mt-4 titles">Vote Your Favorite Singer</h3>
        <div class="row">
						<div class="col-12">
									<table id="datatables-buttons" class="table" style="width:100%">
										<thead class="sticky-top" style="background: #110424;">
											<tr>
                                                <tr> <th>#</th>
                                                    <th>
                                                        IMG
                                                    </th>
                                                    <th>Song Name</th>
                                                    <th>Artist</th>
                                                    <th>Album</th>
                                                    <th>
                                                    Votes
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
											</tr>
										</thead>
										<tbody>


        @foreach ($registration->where('event_id', $event->id)->where('event_id', $event->id) as $userRegistration)

                @php
                    $item = App\Models\User::find($userRegistration->user_id);

                @endphp
                <th>{{$item->id}}</th>
            <td>
				<img src="{{asset('uploads/users/'.$item->image)}}"   height="40" class="ratio11" style="object-fit: cover;" alt="">
		</td>
            <td>{{$item->first_name}} {{$item->last_name}}</td>
            <td> @php
                    $song = App\Models\Song::find($userRegistration->song_id);

                @endphp
                {{$song->name}}{{$song->track_name}}</td>
                <td>  {{$song->artist}}</td>
            <td> @php
            $votecount = App\Models\Vote::where('singer_id', $userRegistration->user_id)->count();

                @endphp
                {{$votecount}}</td>

        <td>

        <button type="button" class="btn btn-bg w-100" data-toggle="modal" data-target=".bd-example-modal-lg{{$item->id}}">Large modal</button>

<!-- <a class="text-white" href=""><i class="fa fa-ellipsis-v"></i>
</a> -->
<div class="ml-auto text-right align-self-center">
<form action="{{url('vote/'.$event->id)}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="modal fade bd-example-modal-lg{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModal{{$item->id}}Label" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content text-dark">
<div class="d-flex justify-content-between col-12">
<div class="d-flex">
<img src="https://i.scdn.co/image/ab67616d0000b27356f3c8c9cadd5b95a85c1373" height="40" class="ratio11 " style="border-radius: 50%; object-fit: cover" alt="">
<div class="mx-2"><h4 >{{$item->first_name}} {{$item->last_name}}</h4> <h6>400 Votes</h6></div>
</div>
<div class="mx-2"><h2>80%</h2></div>
</div>
<div class="fixed-bottom">
<div class="mx-2 col-12 text-center mt-4"><h4>Tell Us How You Feel About {{$item->name}} Performance</h4></div>
<div class="card bg-white  mb-5">
<div class="text-center card-body text-dark">
<h4>Rate Njuguna</h4>
<div class="slider-container">
<div class="slider-value" id="sliderValue">0</div>
<input type="range" min="0" max="10" step="1" id="slider">
<div class="d-flex justify-content-between ">
<h5>Poor</h5><h5>Excellent</h5>
</div>
</div>
            <input type="hidden" name="singer_id" value="{{$item->id}}">
            <input type="hidden" name="voter_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
<textarea name="comment" id="comment" cols="30" rows="2" class="form-control my-3">Add Comment</textarea>
<button type="submit"  class="btn btn-danger w-100">Vote</button>
</div>
</div>

</div>
</div>
</div>
</div>
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
            responsive: true,
            order: [[6, 'asc']]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
    });
</script>

@endsection
