@extends('layouts.app')
@section('title', "Videos")
@section('meta_description', "Videos")
@section('meta_keyword', "Videos")

@section('content')
@include('layouts.inc.category-navbar')


<!-- <div class="mx-5 shadow-sm bg-white p-3">
    
<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> / All Videos
</div>
</div> -->
 <style>
    .d-none.logo{
        display: block !important;
    }
    p { 
    color: #dbdbdb; 
}
</style>
<section id="features" class="features pb-5 bg-dark text-white">
        <div class="container">            
            <h6 class="titles px-2 wow zoomIn my-4 shadow" data-wow-delay=".2s">
                All Videos</h6>
          <div class="row g-2">
            @foreach($latest_posts as $latest_post_item_second)
          <a href="{{url('video/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark d-md-none">
                                  
                    <div class="single-table border-0 mt-0">
                        <div class="card border-0 bg-dark">
                               <div class="player">
                                        <i class="fa fa-play shadow-sm text-white"></i>
                                    </div>
                     <img src="{{asset('uploads/videos/'.$latest_post_item_second->image)}}" class="img-fluid w-100" alt="..." style="height: 280px;">  
                     <div class="card-img-overlay">
                     <h2 class="text-white" style="font-size:27px;">{{Str::limit($latest_post_item_second->name, 163)}}</h2>
                        <!--<p class="text-light">-->
                        <!--            {!! Str::limit($latest_post_item_second->meta_description, 160)!!}-->
                        <!--                </p>-->
                           <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>  </div>
                    </div>
                    </div>
                    </a>
                                  
    <div class="single-table wow fadeInUp mt-2 rounded-0 d-none d-md-block shadow mb-0 dashed" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                            <div class="row">
                                <div class="col-6 px-4" style="align-self: center;">
                                <h6 class="titles px-2 mb-2 wow zoomIn shadow-sm" data-wow-delay=".2s">
                                  <a class="mx-1" href="{{url('iscategory/'.$latest_post_item_second->category->slug)}}"> <i class="fa fa-play"></i> {{$latest_post_item_second->category->name}}</a>
                                    </h6> 
                                <a href="{{url('video/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">

                                    <h2 class="mb-4 text-white">
                                        {{$latest_post_item_second->name}}
                                    </h2>
                                        <p class="mb-4 text-white">
                                    {!! Str::limit($latest_post_item_second->meta_description, 160)!!}
                                        </p>
                                </a>
                                  <div class="my-4 d-flex justify-content-between">
                                
                                    <small class="card-text text-muted float-end">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>
                                </div>

                                </div>
                                <div class="col-6 pr-md-0">
                                <a href="{{url('video/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                <img src="{{asset('uploads/videos/'.$latest_post_item_second->image)}}" class=" h400 img-fluid w-100" alt="...">
                                </a>                           
                             </div>
                        </div>
                        </div>
                    </div> 
                       
          
@endforeach
            </div>
            </div>
          </div>
        </div>
    </section>
<section>
<div class="container">
    <div class="row">
 
        <div class="col-md-9">
            <div class="row">
            @forelse($latest_post as  $latest_post_item_second)
                                  
                       <div class="col-md-4">
                                  <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s" style="position:relative">
                                              <div class="table-content">
                                          <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="">
                                              <div class="table-content">
                                              <a href="{{url('video/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                              <div class="player">
                                        <i class="fa fa-play shadow-sm text-white"></i>
                                    </div>
                                              <img src="{{asset('uploads/videos/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h150" alt="...">
                                              </a> <div class="card-body">
                                                  <a href="{{url('video/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                          
                                                  <h6 class="mb-0">{{$latest_post_item_second->name}}</h6>
                                                  </a>   
                                                  <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>
                      
                                                  </div>
                                              </div>
                                          </div>
                      
                                          </div>
                                      </div>
                                      </div>
            @empty
        <div class="card-body text-white">
            <h4 class="text-white">Congrats, You've reached the end of internet!</h4>
        </div>
        @endforelse
        <div class="paginate">
            {{$post->links()}}
        </div>
        </div>
        </div>
        <div class="col-md-3">
            
        <div class="sticky-top">
                    <div class="single-table wow fadeInUp bg-white mb-3 mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                          <img src="https://demo.themewinter.com/html/vinazine/images/banner/sidebar-banner3.png" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
        </div>
            </div>
            </div>

        </div>
    </div>
</div>
</section>
<body class="bg-dark">
    
</body>

@endsection