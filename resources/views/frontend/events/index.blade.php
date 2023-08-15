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
        <h3 class="titles p-3 px-md-0 pb-0">Upcoming Karaoke Events</h3>
        <!-- <div class="row w-100 d-none d-md-block" style="overflow-x:scroll">
		@foreach($events as $v)
					<div class="col-md-6">
						<a href="{{url('event/'.$v->id.'/register')}}" class="w-100">
						<div class="card p-2 shadow">
						<img src="{{asset('uploads/events/'.$v->image)}}"  class="w-100 ratio13" style="object-fit: cover;" alt="">
							<div class="card-body py-2 px-0">
									<h4 class="text- ">{{$v->name}}</h4>
								<div class="d-flex justify-content-between">
									<small class="text-muted"><b><i class="fa fa-map-marker"></i> Venue:</b> {{$v->venue}}</small>
									<small class="text-muted"><b><i class="fa fa-calendar-alt"></i> On:</b> {{$v->date}}</small>
								</div>
							</div>
						</div>
					    </a>
					</div>
					@endforeach
        </div> -->
        <div class="row w-100  mb-5" style="overflow-x:scroll">
		@foreach($events as $v)
                <div class="col-md-4">
                    <a href="{{url('event/'.$v->id.'/register')}}" class="w-100">
                                        <div class="card shadow p-0">
                                        <img src="{{asset('uploads/events/'.$v->image)}}"  class="w-100 ratio13" style="object-fit: cover;" alt="">
                                        <div class="date">
                                                    <button class="btn"><b>
                                                        <?php $rawDate = $v->date; $dateObj = new DateTime($rawDate); $day = $dateObj->format('jS'); $month = $dateObj->format('M'); $formattedDate = $day . ' ' . $month; echo $formattedDate; ?>
                </b></button>
                                                    <button class="btn bg"><b>Entry:</b> 3,000</button>
                                        </div>

                                                    <button class="btn bg-white book shadow-sm"><b>Book Your Spot</b></button>
                                        </div>
                                        </a>
                </div>

					@endforeach
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
<style>
    .date {
    position: absolute;
    left: 0;
    top: 0;
}
</style>
