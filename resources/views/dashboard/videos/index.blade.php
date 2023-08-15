
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
						<h1 class="h3 mb-3">All Users</h1>
						<button type="submit" class="btn btn-lg btn-dark py-1 px-4" href="{{url('admin/add-video')}}">Add Video</button>
					</div>
 
				<div class="row"> 
					@foreach($videos as $v)
					<div class="col-md-4"> 
						<a href="{{url('admin/video/'.$v->category->slug.'/'.$v->slug)}}" class="w-100">
						<div class="card p-2 shadow"> 
						<img src="{{asset('uploads/videos/'.$v->image)}}" class="w-100 ratio169" style="object-fit: cover;" alt=""> 
							<div class="card-body py-2 px-0">
								<div class="d-flex justify-content-between">
									<h5 class="text-muted"><b><i class="fa fa-user-circle"></i> On Stage:</b>{{$v->name}}</h5>
									<h5><b><i class="fa fa-ellipsis-h"></i></b></h5>
								</div>
								<div class="d-flex justify-content-between">
									<h5 class="text-muted"><b><i class="fa fa-glass-martini-alt"></i> Venue:</b>{{$v->category->name}}</h5>
									<h5 class="text-muted"><b><i class="fa fa-calendar-alt"></i> On:</b> {{$v->created_at}}</h5>
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