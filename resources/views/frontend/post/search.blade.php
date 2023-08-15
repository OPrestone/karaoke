@extends('layouts.app')
@section('title', " ")
@section('meta_description', " ")
@section('meta_keyword', " ")

@section('content')
@include('layouts.inc.category-navbar')
<style>
    .logo {
        display: block !important;
    }
</style>
<div class="container shadow-sm bg-white p-3">
    
<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> / search results

</div>
</div>
<section class="py-4">
<div class="container">
    <h5 class="catname">
        
    </h5>
    <div class="row">
        <div class="col-md-8 mt-2 pl-md-0">
            <div class="row g-2">
    @if($posts->isNotEmpty())
    @foreach($posts as $postitem)
            <div class="col-md-6">
        <a href="{{url('article/'.$postitem->category->slug.'/'.$postitem->slug)}}" class="p-0 m-0">
                    <div class="single-table wow fadeInUp mt-2 p-0 rounded-0 bg-white shadow-sm" data-wow-delay=".2s">
                        <div class="table-content p-0">
        <div class="card">
                <img src="{{asset('uploads/posts/'.$postitem->image)}}" class="img-fluid rounded-start h180" alt="...">
             
                <div class="card-body">
                    <h5 class="card-title">{{$postitem->name}}</h5>
                    <p class="card-text"><small class="text-muted">Created On {{$postitem->created_at->format('d-m-Y')}} | By {{$postitem->user->name}} </small></p>
                </div>
            </div>

        </div>
            </div>
        </a>
            </div>
    @endforeach
@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif
           
    </div>
    </div>
    <div class="col-md-4">
        
    <div class="sticky-top">
                    <div class="single-table wow fadeInUp mt-2 rounded-0 bg-white shadow-sm" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                          <img src="https://s0.2mdn.net/simgad/13075121647830781130" class="w-100" alt="">
                        </div>
                    <div class="card-body pt-3">
                        
                    <h6 class="titles wow zoomIn cat-title px-2 mb-3 shadow" data-wow-delay=".2s">Trending Posts</h6>

                        @foreach ($most_read as $post)

                  <div class="row mb-2 rela">
                      <div class="col-3 pr-md-0">
                      <a href="{{url('article/'.$post->category->slug.'/'.$post->slug)}}" class="text-dark w-100">

                      <img src="{{asset('uploads/posts/'.$post->image)}}" class="img-fluid rounded-start w-100 h60" alt="...">
                      </a>

                      </div>
                      <div class="col-9">
                      <a href="{{url('article/'.$post->category->slug.'/'.$post->slug)}}" class="text-dark">

                      <h6 class="mb-0">
                           {{$post->name}}
                       </h6>
                      </a>

                      <small class="card-text mt-0 text-muted">{{$post->created_at->diffForHumans()}} | By {{$post->user->name}} </small>

                      </div>
                  </div>
                        @endforeach
                    </div>
                      </div>

                </div>
                    </div>
    </div>
    </div>
</div>
</section>


@endsection
