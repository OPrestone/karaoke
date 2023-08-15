
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
						<h1 class="h3 mb-3">{{$post->name}}</h1>
						<button type="submit" class="btn btn-lg btn-dark py-1 px-4" href="{{url('admin/add-video')}}">Edit Video</button>
					</div>
				<div class="row">  
					<div class="col-md-9">  
						<div class="card p-2 shadow"> 
					<div class="plyr__video-embed" id="player">
					<iframe
						src="https://www.youtube.com/embed/{!! substr($post->yt_iframe, -11) !!}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;autoplay=1&amp;muted=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
						allowfullscreen
						allowtransparency
						allow="autoplay"
                        >
                    </iframe>
					</div> 
						</div> 
					</div>  
				  </div>
				</div>
			</main>
            @endsection

