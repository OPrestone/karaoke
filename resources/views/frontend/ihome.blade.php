@extends('layouts.app')

@section('title', "Prestone web Pages")
@section('meta_description', "Prestone web Pages")
@section('meta_keyword', "Prestone web Pages")


@section('content') 
    <section id="pricing" class="pricing-table pt-0">
        <div class="mx-5">
            <div class="row mb-4">
@foreach($breaking as $latest_post_item_second)
<a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                                  <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                                      <div class="table-content p-3 py-2">
                                          <button class="bg-danger w-100 p-3 border-0 text-white">
                                              BREAKING NEWS
                                          </button>
                                          <div class="row">
                                              <div class="col-6">
                                              <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h300" alt="...">
              
                                              </div>
                                              <div class="col-6">
                                          <h3 class="my-4"><b>{{$latest_post_item_second->name}}</b></h3>
                                                  <p class="card-text">
                                                  {!! Str::limit($latest_post_item_second->meta_description, 240)!!}                                    </p>
                                                  <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>
                                                <div>
                                                <button class="bg-danger mt-3 p-1 px-3 text-white border-0">Read More</button>

                                                </div>                                              </div>
                                          </div>
                                        
                                          
                                      </div>
                                      <!-- End Table Content -->
                                  </div>
                                  </a>
@endforeach
            </div>
        </div>
    </section>
    <section id="pricing" class="pricing-table pt-0">
        <div class="mx-5">
            <div class="row">
                <div class="col-md-5 col-12 pr-md-0">
                   
                    <div class="wow fadeInUp mt-2" data-wow-delay=".2s">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                            @foreach($latest_posts as $latest_post_item)
         
                              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                  <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100">
                                  <div class="card border-0 text-white">
                                  <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid w-100" alt="...">
                                <div class="card-img-overlay">
                            <h5 class="mb-2 bg-danger text-white px-2" style="width: max-content;">{{$latest_post_item->category->name}}</h5>
                                    <h3 class="card-title text-white"><b>{{$latest_post_item->name}}</b></h3>
                                   
                                    <p class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </p>
                                </div>
                                </div>
                                  </a>
                                </div>
@endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <!-- Single Table -->
                        
                        
                      
                    @foreach($latest_post_second as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                            <h6 class="mb-2">{{$latest_post_item_second->name}}</h6>
                            <div class="row">
                                <div class="col-4">
                                <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h70" alt="...">

                                </div>
                                <div class="col-8">
                                    <p class="card-text">
                                    {!! Str::limit($latest_post_item_second->meta_description, 60)!!}                                    </p>
                                    <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                                </div>
                            </div>
                          
                            
                        </div>
                        <!-- End Table Content -->
                    </div>
                    </a>
@endforeach
                    <!-- End Single Table-->
                </div>
                <div class="col-md-3 col-12 pl-md-0">
                                        
                    <div class="single-table wow fadeInUp mt-2 mx-0 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3">
                @foreach($latest_cate4_2 as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                            <div class="row">
                                <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h140" alt="...">

                            <h6 class="mt-1 {{ $loop->first ? 'mb-2' : '' }}">{{$latest_post_item_second->name}}</h6>
                                   
                            </div>
                          
                            
                    </a>
@endforeach
                <!-- @foreach($latest_cate4_2 as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                            <div class="row">
                            <p class="mt-2"><b>{{$latest_post_item_second->name}}</b></p>
                                   <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                            </div>
                          
                            
                    </a>
@endforeach -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="features" class="features">
        <div class="mx-5">
            <div class="row">
                
@foreach($all_categories as $all_cate_item)
                <div class="col-lg-3 col-md-6 col-12 mb-3">
            <a href="{{url('iscategory/'.$all_cate_item->slug)}}">
                    <div class="single-feature wow fadeInUp p-1 d-flex" data-wow-delay=".2s">
                    <img src="{{asset('uploads/category/'.$all_cate_item->image)}}" class="w-100 img-fluid round" alt="...">
                        <h3 class="p-3 m-0">{{$all_cate_item->name}}</h3>
                    </div>  
            </a>
                </div>   
@endforeach             
            </div>
        </div>
    </section> -->
    <section id="features" class="features pt-4">
        <div class="mx-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Trending Posts</h4>
        <div class="row g-2">
        @foreach($latest_home as $latest_post_item)
        <div class="col-md-3 mb-3">
                    <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s">
                        <div class="table-content">
                    <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100 text-dark">
                                  
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <div class="table-content">
                                <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="h180 img-fluid w-100" alt="...">
                            <div class="card-body">
                                
                            <h6 class="mb-2">{{Str::limit($latest_post_item->name, 63)}}</h6>
                                                                  <small class="card-text text-muted">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

                            </div>
                        </div>
                        <!-- End Table Content -->
                    </div>
                    </a>

                </div>
                </div>
        </div>
@endforeach
        </div>
        </div>
    </section> 
     <section id="features" class="features py-5">
        <div class="mx-5 text-center">
    <img src="http://cars-care.net/wp-content/uploads/2017/08/dunlop-1.jpg" class="" alt="">
    </div>
    </section>
 
    <section id="features" class="features py-5">
        <div class="mx-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Entertainment</h4>
          <div class="row g-2">
            <div class="col-md-3">
            @foreach($entertainment_2 as $latest_post_item_second)
                                  
                       
            <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                        <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">

                        <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h150" alt="...">
                        </a> <div class="card-body">
                            <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
    
                            <h6 class="mb-0">{{$latest_post_item_second->name}}</h6>
                            </a>   
                            <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                            </div>
                        </div>
                        <!-- End Table Content -->
                    </div>

                </div>
                </div>
@endforeach
            </div>
            <div class="col-md-6">
            @foreach($entertainment as $latest_post_item_second)
                                  
                       
                                  <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                              <div class="table-content">
                                        <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                              <div class="table-content">
                                              <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                      
                                              <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h400" alt="...">
                                              </a> <div class="card-body">
                                                  <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                          
                                                  <h3 class="mb-2"><b>{{$latest_post_item_second->name}}</b></h3>
                                                  </a>   
                                                  <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>
                      
                                                  </div>
                                              </div>
                                              <!-- End Table Content -->
                                          </div>
                      
                                      </div>
                                      </div>
                      @endforeach
            </div>
          
            <div class="col-md-3">
            @foreach($entertainment_3 as $latest_post_item_second)
                                  
                       
            <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                        <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">

                        <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h150" alt="...">
                        </a> <div class="card-body">
                            <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
    
                            <h6 class="mb-0">{{$latest_post_item_second->name}}</h6>
                            </a>   
                            <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                            </div>
                        </div>
                        <!-- End Table Content -->
                    </div>

                </div>
                </div>
@endforeach
            </div>
            </div>
          </div>
        </div>
    </section>
 

    <section id="pricing" class="pricing-table pt-0">
        <div class="mx-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Acr</h4>
            <div class="row g-2">
              
            <div class="col-md-5 col-12 pl-md-0">
                                        
                                        <div class="single-table wow fadeInUp mt-2 mx-0 rounded-0" data-wow-delay=".2s">
                                            <div class="table-content p-3">
                                    @foreach($latest_cate4 as $latest_post_item_second)
                                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                                  <div class="row">
                                      <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h230" alt="...">
      
                                  <h4 class="my-2">{{$latest_post_item_second->name}}</h4>
                                  <p>
                                                  {!! Str::limit($latest_post_item_second->meta_description, 130)!!} 
                                  </p>
                                  
                                  </div>
                                
                                  
                          </a>
                    @endforeach
                    
                                            </div>
                                            </div>
                                            <!-- End Table Content -->
                                        </div>
                <div class="col-md-4 col-12">
                    @foreach($sports as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                            <div class="row">
                                <div class="col-4 pr-md-0">
                                <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h70" alt="...">

                                </div>
                                <div class="col-8">
                            <p class="mb-0">         
                                <b>
                                    {!! Str::limit($latest_post_item_second->name, 60)!!} 
                                </b>
                            </p>
                                   
                                    <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                                </div>
                            </div>
                          
                            
                        </div>
                        <!-- End Table Content -->
                    </div>
                    </a>
@endforeach
                    <!-- End Single Table-->
                </div>
                <div class="col-md-3 col-12 pl-md-0">
            <h4 class="wow zoomIn cat-title" data-wow-delay=".2s">Acr</h4>
                                        
                    <div class="single-table wow fadeInUp mt-2 mx-0 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3">
                @foreach($latest_cate4 as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                            <div class="row border-bottom">
                                <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h155" alt="...">

                            <h6 class="my-2">{{$latest_post_item_second->name}}</h6>
                                   
                            </div>
                          
                            
                    </a>
@endforeach
                @foreach($latest_cate4_2 as $latest_post_item_second)
                    <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                  
                            <div class="row">
                            <p class="mt-2"><b>{{$latest_post_item_second->name}}</b></p>
                                   <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>

                            </div>
                          
                            
                    </a>
@endforeach
                        </div>
                        <!-- End Table Content -->
                    </div>
                </div>
                    <div class="col-md-3">
                      <div class="sticky-top">
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                          <img src="https://s0.2mdn.net/simgad/13075121647830781130" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing-table pt-0">
        <div class="mx-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Health</h4>
            <div class="row g-2">
              
                                    @foreach($latest_post_second as $latest_post_item_second)
            <div class="col-md-4 col-12 pl-md-0">
                                        <div class="single-table wow fadeInUp mt-2 mx-0 rounded-0" data-wow-delay=".2s">
                                            <div class="table-content p-3">
                                        <a href="{{url('article/'.$latest_post_item_second->category->slug.'/'.$latest_post_item_second->slug)}}" class="w-100 text-dark">
                                                      
                                                <div class="row">
                                                    <img src="{{asset('uploads/posts/'.$latest_post_item_second->image)}}" class="img-fluid w-100 h180" alt="...">
                    
                                                <h5 class="mt-2">{{$latest_post_item_second->name}}</h5>
                                                <small class="card-text text-muted">{{$latest_post_item_second->created_at->diffForHumans()}} | By {{$latest_post_item_second->user->name}} </small>
    
                                                </div>
                                              
                                                
                                        </a>
                                  
                                            </div>
                                            </div>
                                            <!-- End Table Content -->
                                        </div>
                    @endforeach
              
                    <!-- <div class="col-md-2">
                      <div class="sticky-top">
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                          <img src="https://s0.2mdn.net/simgad/13075121647830781130" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
            </div> -->
        </div>
    </section>

    <section id="features" class="features pt-4">
        <div class="mx-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Sports</h4>
        <div class="row g-2">
        @foreach($sports as $latest_post_item)
        <div class="col-md-3 mb-3">
                    <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s">
                        <div class="table-content">
                    <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100 text-dark">
                                  
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <div class="table-content">
                                <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="h180 img-fluid w-100" alt="...">
                            <div class="card-body">
                                
                            <h6 class="mb-2">{{Str::limit($latest_post_item->name, 63)}}</h6>
                                                                  <small class="card-text text-muted">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

                            </div>
                        </div>
                        <!-- End Table Content -->
                    </div>
                    </a>

                </div>
                </div>
        </div>
@endforeach
        </div>
        </div>
    </section> 

@endsection