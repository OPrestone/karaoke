@extends('layouts.dash-auth')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  			
<main class="content">
				<div class="container p-0">
					<div class="d-flex justify-content-between mb-3"> 
						<h1 class="h3">All Events</h1>
 					</div>
 
				<div class="row"> 
					@foreach($events as $v)
					<div class="col-md-3"> 
						<a href="{{url('user/'.$v->id.'/register')}}" class="w-100">
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
				  </div>
				</div>
			</main>
			

            @endsection