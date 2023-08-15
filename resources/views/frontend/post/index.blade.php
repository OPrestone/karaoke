@extends('layouts.app')
@section('title', " $category->meta_title")
@section('meta_description', " $category->meta_description")
@section('meta_keyword', " $category->meta_keyword")

@section('content')
@include('layouts.inc.category-navbar')

<div class="container shadow-sm bg-white p-3">
    
<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> / {{$category->name}}

</div>
</div>
<div class="container">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2445563419404346"
     crossorigin="anonymous"></script>
<!-- vert ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2445563419404346"
     data-ad-slot="9378570062"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<section id="features" class="features pb-5">
        <div class="container">            
            <h6 class="titles px-2 wow zoomIn my-4" data-wow-delay=".2s">
                {{$category->name}}
</h6>
          <div class="row g-2 shadow-sm bg-white">
            <div class="col-md-3 order-2 order-md-1">
            @foreach($latest_post as $k)
                                  
                       
            <div class="single-table wow fadeInUp bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                        <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">

                        <img src="{{asset('uploads/posts/'.$k->image)}}" class="img-fluid w-100 h150" alt="...">
                        </a> <div class="card-body">
                            <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">
    
                            <h6 class="mb-0">{{$k->name}}</h6>
                            </a>   
                            <small class="card-text text-muted">By {{$k->user->name}} </small>

                            </div>
                        </div>
                    </div>

                </div>
                </div>
@endforeach
            </div>
            <div class="col-md-6 order-1 order-md-2">
            @foreach($latest_posts as $k)
                                  
                       
                                  <div class="single-table wow fadeInUp mt-2 mt-md-0 bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                              <div class="table-content">
                                        <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                              <div class="table-content">
                                              <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">
                      
                                              <img src="{{asset('uploads/posts/'.$k->image)}}" class="img-fluid w-100 h400" alt="...">
                                              </a> <div class="card-body">
                                                  <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">
                          
                                                  <h3 class="mb-2"><b>{{$k->name}}</b></h3>
                                                  </a>   
                                                  <small class="card-text text-muted">By {{$k->user->name}} </small>
                      
                                                  </div>
                                              </div>
                                                  </div>
                      
                                      </div>
                                      </div>
                      @endforeach
            </div>
          
            <div class="col-md-3 order-3">
            @foreach($latest_post_2 as $k)
                                  
                       
            <div class="single-table wow fadeInUp mt-2 mt-md-0 bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                        <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">

                        <img src="{{asset('uploads/posts/'.$k->image)}}" class="img-fluid w-100 h150" alt="...">
                        </a> <div class="card-body">
                            <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">
    
                            <h6 class="mb-0">{{$k->name}}</h6>
                            </a>   
                            <small class="card-text text-muted">By {{$k->user->name}} </small>

                            </div>
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
            @forelse($latest_post_3 as $postitem)
        <a href="{{url('article/'.$postitem->category->slug.'/'.$postitem->slug)}}" class="w-100 text-dark mb-3 d-none d-md-block">
                                  
                                  <div class="single-table wow fadeInUp mt-2 rounded-0 bg-white" data-wow-delay=".2s" style="position: relative;">
                                      <div class="table-content p-3 py-2">
                                          <div class="row">
                                              <div class="col-5 pr-md-0">
                                              <img src="{{asset('uploads/posts/'.$postitem->image)}}" class="img-fluid w-100 h230" alt="...">
                                                                <h5 class="catebg"> {{$postitem->category->name}}</h5>

                                              </div>
                                              <div class="col-7">                                  

                                          <h4 class="mb-3 p-2">         
                                              <b>
                                                  {!! Str::limit(trim($postitem->name, 180))!!} 
                                              </b>
                                          </h4>
                                          <p>
                                                  {!! Str::limit(trim(strip_tags($postitem->description)), 230)!!} 
                                                </p>
                                                 
                                                  <small class="card-text text-muted float-end"> By {{$postitem->user->name}} </small>
              
                                              </div>
                                          </div>
                                        
                                          
                                      </div>
                                  </div>
                                  </a>
                                    <a href="{{url('article/'.$postitem->category->slug.'/'.$postitem->slug)}}" class="w-100 text-dark d-md-none">
                                  
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2 bg-white">
                            <div class="row">
                                <div class="col-4 pr-md-0">
                                <img src="{{asset('uploads/posts/'.$postitem->image)}}" class="img-fluid w-100 h70" alt="...">

                                </div>
                                <div class="col-8">
                            <p class="mb-0">         
                                <b>
                                    {!! Str::limit($postitem->name, 80)!!} 
                                </b>
                            </p>
                                   
                                    <small class="card-text text-muted float-end"> By {{$postitem->user->name}} </small>

                                </div>
                            </div>
                          
                            
                        </div>
                    </div>
                    </a>
        @empty
        <div class="card-body">
            <h4>Congrats, You've reached the end of internet!</h4>
        </div>
        @endforelse
        <!--<div class="paginate">-->
        <!--    {{$post->links()}}-->
        <!--</div>-->
        </div>
        </div>
        <div class="col-md-3">
            
        <div class="sticky-top">
                    <div class="single-table wow fadeInUp bg-white mb-3 mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                         <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2445563419404346"
     crossorigin="anonymous"></script>
<!-- responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2445563419404346"
     data-ad-slot="5267385926"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
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
<style>
    @media (max-width:768px){
        h3 {
    font-size: 18px;
}
    }
</style>

@endsection