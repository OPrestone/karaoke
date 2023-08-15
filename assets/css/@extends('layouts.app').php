@extends('layouts.app')
@section('title', " $post->name")
@section('meta_description', " $post->meta_description")
@section('meta_keyword', " $post->meta_keyword")
<meta property="og:image" content="{{asset('uploads/posts/'.$post->image)}}"/>
<meta property="og:title" content="{{$post->name}}"/>
<meta property="og:description" content="{!!$post->meta_description!!}"/>
<meta property="og:image:alt" content="{{$post->name}}"/>
<meta property="og:url" content="{{ url()->current() }}"/>
<meta property="og:image" content="url_image">
<link itemprop="thumbnailUrl" href="image_url"> 
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href=" image_url ">
</span>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Newshubke">
<meta name="twitter:creator" content="@Newshubke">
<meta name="twitter:title" content="{!!$post->name!!}">
<meta name="twitter:description" content="{!!$post->meta_description!!}">
<meta name="twitter:image" content="{{asset('uploads/posts/'.$post->image)}}">

@section('content')
<div class="container shadow-sm bg-white p-3">

<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> / <a class="mx-1" href="{{url('iscategory/'.$post->category->slug)}}"> {{$post->category->name}}</a> /  {{$post->name}}

</div>

@if (session('message'))
                       <div class="alert alert-success">
                           {{session('message')}}
                       </div>
                   @endif
</div>
<section class="py-4">
<div class="container shadow-sm bg-white py-3">
    <h1 class="catname d-none d-md-block">
<b>      {!!$post->name!!}
</b>
</h1>
    <h1 class="catname d-md-none" style="font-size: 25px">
<b>      {!!$post->name!!}
</b>
</h1>
    <div class="row my-4">
        <div class="col-md-8">
            <div class="row justify-content-between">
                <div class="float">
                    <a href="{{url('iscategory/'.$post->category->slug)}}" class="text-dark">

                                        <h6 class="bg-danger text-white py-1 px-2">
                                            {{$post->category->name}}
                                        </h6>
                                        </a>

                    </div>
            <div class="px-3 float">
                                    <div class="mb-3">
                                        <small class="card-text text-muted mx-3">Posted {{$post->created_at->diffForHumans()}} | By {{$post->user->name}} </small>

                                        <div class="socialmedia-buttons btn-group">
                                            <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"
                                               class="btn btn-facebook btn_facebook rounded-0 text-white">
                                                <span class="fab fa-facebook-f"></span>
                                            </a>
                                            <a href="https://twitter.com/share?url={{ url()->current() }}&hashtags={{ ' ' }}&text={{ urlencode($post->name) }}"
                                               class="btn btn-twitter btn_twitter rounded-0 text-white">
                                                <span class="fab fa-twitter texu-white"></span>
                                            </a>
                                           
                                            <a href=" https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}&text={{  $post->name }}"
                                               class="btn btn-telegram btn_telegram rounded-0 text-white">
                                                <span class="fab fa-telegram-plane"></span>
                                            </a>
                                            <a href="https://web.whatsapp.com/send?text={{ url()->current() }}"
                                               class="btn btn-whatsapp btn_whatsapp rounded-0 text-white d-none d-md-block">
                                                <span class="fab fa-whatsapp"></span>
                                            </a>
                                            <a href="whatsapp://send?text={{ $post->name.' – '.( url()->current()) }}&utm-source=whatsapp&utm-medium=share&utm-campaign={{ $post->name }} "
                                               class="btn btn-whatsapp btn_whatsapp rounded-0 text-white d-block d-md-none">
                                                <span class="fab fa-whatsapp"></span>
                                            </a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn
"
                                               class="btn btn-linkedin btn_linkedin rounded-0 text-white">
                                                <span class="fab fa-linkedin-in"></span>
                                            </a>
                                            <a href="mailto:?subject={{ $post->name }}body={{ $post->meta_description }} link : {{ url()->current() }} ."
                                               class="btn btn-email btn_email rounded-0 text-white">
                                                <span class="fa fa-envelope"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
            </div>


        <img src="{{asset('uploads/posts/'.$post->image)}}" class="img-fluid rounded-start w-100" alt="{{$post->category->name}}">

       <div class="card-body">

      {!!$post->description!!}
           <form action="{{url('comment')}}" method="POST">
               @csrf

               <div class="comment">

                   @if ($errors->any())
                       <div class="alert alert-danger">
                           @foreach ($errors->all() as $error)
                               <div>
                                   {{$error}}
                               </div>
                           @endforeach
                       </div>
                   @endif
                   <div class="row">
                       <div class="col-10">
                           <input type="hidden" name="post_slug" value="{{$post->slug}}">
                           <textarea name="comment_body" id="" cols="3" rows="3" class="shadow-sm w-100 p-3" placeholder="Enter your comment..."></textarea>
                       </div>
                       <div class="col-2">
                           <button type="submit" class="btn btn-success w-100"> Comment</button>

                       </div>
                   </div>
                   <div class="row mt-4 d-flex justify-content-end">
                       @foreach($post->comments as $comment)
                           <div class="w-75 shadow-sm bg-light mb-3">

                               <small class="card-text mt-0 text-muted float-start">{{$comment->created_at->diffForHumans()}}</small><br>
                               <div class="row mb-2 rela w-75">
                                   <div class="col-3 pr-md-0">
                                   <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid rounded-start w-100 h60" alt="...">

                                   </div>
                                   <div class="col-9">
                                       <strong class="card-text text-dark bg-info px-2 mb-2">
                                           @if($comment->user)
                                            {{$comment->user->name}}
                                           @endif </strong>


                                           <p class="mb-0">
                                               {{$comment->comment_body}}
                                           </p>
                                           @if(Auth::check() && Auth::id() == $comment->user_id)
                                           <div class="float-end">
                                               
                                           <button class="btn-primary px-2 btn-sm border-0">Edit</button>
                                           <button class="btn-danger px-2 btn-sm border-0">Delete</button>
                                           </div>

                                           @endif
                                           @if(Auth::check() && Auth::id() != $comment->user_id)
                                           <div class="float-end">

                                           <button class="btn-primary px-2 btn-sm border-0">Reply</button>
                                           <button class="btn-info px-2 btn-sm border-0">Like</button>
                                           </div>

                                           @endif
                                   </div>
                               </div>
                           </div>
                   @endforeach
               </div>
           </form>
       </div>
     <div class="row mt-4 d-flex">
     <div class="col-6 shadow-sm"> 
          @foreach($next as $latest_post_item)
                           <div class="">

                               <small class="card-text mt-0 text-muted float-start">{{$latest_post_item->created_at->diffForHumans()}}</small><br>
                               <div class="row mb-2 rela">
                                   <div class="col-3 pr-md-0">

                                       <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark w-100">

                                           <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60" alt="...">
                                       </a>

                                   </div>
                                   <div class="col-9">
                                   <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                                        <h6 class="mb-0">
                                            {{$latest_post_item->name}}
                                        </h6>
                                        </a>
                                        <small class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

                                   </div>
                               </div>
                           </div>
                   @endforeach
                </div>
         @foreach($previous as $latest_post_item)
         <div class="col-6 shadow-sm">
                      <small class="card-text mt-0 text-muted float-end">Previous Post</small> <br>
       <div class="row mb-2 rela">
                      <div class="col-9">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                      <h6 class="mb-0">
                           {{$latest_post_item->name}}
                       </h6>
                      </a>
                      <small class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>


                      </div>
                      <div class="col-3 pr-md-0">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark w-100">

                      <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60" alt="...">
                      </a>

                      </div>
                  </div>
         </div>
        @endforeach
     </div>
       <style>
           .rela h6 {
    font-size: 14px;
    line-height: 1;
}
       </style>
       
      <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Related Posts</h4>
        <div class="row g-2 rela">
        @foreach($related_posts as $latest_post_item)
        <div class="col-md-4 mb-3">
                    <div class="single-table wow fadeInUp mt-2 bg-white" data-wow-delay=".2s">
                        <div class="table-content">
                    <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100 text-dark">

                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <div class="table-content w-100">
                                <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="h155 img-fluid w-100" alt="...">
                            <div class="card-body px-0">

                            <p class="mb-2"><b>{{Str::limit($latest_post_item->name, 63)}}</b></p>
                                <small class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

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
       <div class="row mt-4 d-flex justify-content-center comment">
                           <div class="w-75 shadow-sm bg-light mb-3">

                               <small class="card-text mt-0 text-muted float-start">Author Details</small><br>
                               <div class="row mb-2 rela w-75">
                                   <div class="col-3 pr-md-0">
                                   <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid rounded-start w-100 h60" alt="...">

                                   </div>
                                   <div class="col-9">
                                       <strong class="card-text text-dark bg-info px-2 mb-2">
                                          
                                            {{$post->user->name}} 
                                               {{$post->user->role_as == '1' ? 'Admin':'User'}}
                                         </strong>


                                           <p class="mb-0">
                                               {{$post->user->role_as == '1' ? 'Admin':'User'}}
                                           </p>
                                           @if(Auth::check() && Auth::id() == $post->user_id)
                                           <div class="float-end">
                                               
                                           <button class="btn-primary px-2 btn-sm border-0">Edit</button>
                                           <button class="btn-danger px-2 btn-sm border-0">Delete</button>
                                           </div>

                                           @endif
                                          
                                   </div>
                               </div>
                           </div>
               </div>
      </div>
        </div>
        <div class="col-md-4">
            <div class="sticky-top">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">

                        @foreach ($latest_posts as $latest_post_item)

                  <div class="row mb-2 rela">
                      <div class="col-3 pr-md-0">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark w-100">

                      <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60" alt="...">
                      </a>

                      </div>
                      <div class="col-9">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                      <h6 class="mb-0">
                           {{$latest_post_item->name}}
                       </h6>
                      </a>

                      <small class="card-text mt-0 text-muted">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

                      </div>
                  </div>
                        @endforeach
                    </div>

                </div>
                <div class="sticky-top">
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
                        <div class="table-content p-3 py-2">
                          <img src="https://s0.2mdn.net/simgad/13075121647830781130" class="w-100" alt="">
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="features" class="features bg-light pt-4">
        <div class="mx-md-5">
            <h4 class="wow zoomIn cat-title mt-4" data-wow-delay=".2s">Trending Posts</h4>
        <div class="row">
        @foreach($latest_cate4_2 as $latest_post_item)
        <div class="col-md-3 mb-3">
                    <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s">
                        <div class="table-content">
                    <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100 text-dark">

                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <div class="table-content">
                                <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="h180 img-fluid w-100" alt="...">
                            <div class="card-body">

                            <h6 class="mb-2">{{Str::limit($latest_post_item->name, 63)}}</h6>
                                 <p class="card-text">
                                 {!! Str::limit($latest_post_item->meta_description, 50)!!}
                                                                  </p>
                                <p class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </p>

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

    <div class="also-like px-3 shadow-sm alsoread" id="myID">
        <h6 class="wow zoomIn cat-title my-2" data-wow-delay=".2s"><b>You May Also Like</b></h6>
        @foreach($also_posts as $latest_post_item)
        <div class="row mb-2 rela">
                      <div class="col-3 pr-md-0">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                      <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60" alt="...">
                      </a>

                      </div>
                      <div class="col-9">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                      <h6 class="mb-0">
                           {{$latest_post_item->name}}
                       </h6>
                      </a>

                      <small class="card-text mt-0 text-muted">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </small>

                      </div>
                  </div>
@endforeach
        </div>
        
@endsection
