@extends('layouts.app')
@section('title', " $post->name")
@section('meta_description', " $post->meta_description")
@section('meta_keyword', " $post->meta_keyword") 
@section('content')
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content="{{strip_tags($post->description)}}"/>
    <meta name="keywords" content="@yield('meta_keyword')"/>
    <meta name="author" content="{{$post->user->name}}"/>
    <meta name='robots' content='max-image-preview:large' />
<link rel='dns-prefetch' href='//s.w.org' />
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="Mix News Kenya Kenya"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$post->name}}"/>
    <meta property="og:description" content="{{strip_tags($post->description)}}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{asset('uploads/posts/'.$post->image)}}"/>
    <meta property="og:image:width" content="750"/>
    <meta property="og:image:height" content="422"/>
    <meta property="article:author" content="{{$post->user->name}}"/>
    <meta property="fb:app_id" content=""/>
    <meta property="article:tag" content="@yield('meta_keyword')"/>
    <meta property="article:tag" content="{{$post->name}}"/>
    <meta property="article:published_time" content="{{$post->created_at}}"/>
    <meta property="article:modified_time" content="{{$post->created_at}}"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@Newshubke">
    <meta name="twitter:creator" content="@Newshubke">
    <meta name="twitter:title" content="{{$post->name}}"/>
    <meta name="twitter:description" content="{{strip_tags($post->description)}}"/>
    <meta name="twitter:image" content="{{asset('uploads/posts/'.$post->image)}}"/> 
    <link rel="canonical" href="{{ url()->current() }}"/>
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-US"/>
@include('layouts.inc.frontend-navbar')

     </head>
<style>
    iframe {
    border: 0;
    width: 100%;
}p b {
    font-size: 18px !important;
    font-weight: 900;
    font-family: 'Viral-Text' !important;
} 
@media (max-width: 768px){

iframe {
    border: 0;
    width: 100%;
    max-height: 670px;
}
}
.caption {
    background: #f9d4412b;
    width: 100%;
    font-size: 14px !important;
    padding: 2px 8px;
}
</style>
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

                                        <h6 class="bg-danger shadow mb-2 py-1 px-2">
                                            {{$post->category->name}}
                                        </h6>
                                        </a>

                    </div>
            <div class="px-3 float">
                                    <div class="mb-3">
                                        <small class="card-text text-muted ">  By   <img src="{{asset('uploads/users/'.$post->user->image)}}" class="img-fluid" alt="{{$post->category->name}}" style="    margin-right: 4px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    object-fit: cover;"> {{$post->user->name}} </small>

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

        <img src="{{asset('uploads/posts/'.$post->image)}}" class="img-fluid  w-100" alt="{{$post->category->name}}">
        <p class="caption">
            {{$post->caption}}
        </p>

           <div class="content-body my-4">
               

               {!!  trim($post['description']) !!}
 
                        <div>Tags:</div> 
                    
       <!--<div class="card-body p-2 p-md-3">-->
       <!--    <div class="content-body mb-4">-->
       <!--        {!!  htmlspecialchars_decode($post['description']) !!}-->
         
       <!--    </div>  -->
       </div>
       <div>
                    <div class="w-100"> 
                    @foreach($tags as $tag)
                        @foreach(explode(',', $tag->meta_keyword) as $keyword)
                     
                        <a href="{{url('tags/'.$keyword)}}" class="text-dark">

                        <span class="bg-danger shadow m-2 py-0 px-2">
                        {{$keyword}}
                        </span>
                        </a>
                            
                        @endforeach
                        @endforeach
                        
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2445563419404346"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-2445563419404346"
     data-ad-slot="4177396031"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div>         
           <form action="{{url('comment')}}" method="POST">
               @csrf

               <div class="comment dashed py-3">

                   @if ($errors->any())
                       <div class="alert alert-danger">
                           @foreach ($errors->all() as $error)
                               <div>
                                   {{$error}}
                               </div>
                           @endforeach
                       </div>
                   @endif
                   <div class="row mx-0">
                       <div class="col-12 col-md-10">
                           <input type="hidden" name="post_slug" value="{{$post->slug}}">
                           <textarea name="comment_body" id="" cols="3" rows="3" class="shadow-sm w-100 p-3" placeholder="Enter your comment..."></textarea>
                       </div>
                       <div class="col-md-2 col-4 mt-2">
                           <button type="submit" class="btn btn-success w-100"> Comment</button>

                       </div>
                   </div>
                   <div class="row mt-4 d-flex justify-content-end">
                       @foreach($post->comments as $comment)
                           <div class="w-75 shadow-sm bg-light mb-3">

                               <small class="card-text mt-0 text-muted float-start">{{$comment->created_at->diffForHumans()}}</small><br>
                               <div class="row mb-2 rela w-75">
                                   <div class="col-3 pr-md-0">
                                   <img src="{{asset('uploads/users/'.$comment->user->image)}}" class="img-fluid rounded-start w-100 h60" alt="{{$post->category->name}}">

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
                                           <!--<div class="float-end">-->
                                               
                                           <!--<button class="btn-primary px-2 btn-sm border-0">Edit</button>-->
                                           <!--<button class="btn-danger px-2 btn-sm border-0">Delete</button>-->
                                           <!--</div>-->

                                           @endif
                                           @if(Auth::check() && Auth::id() != $comment->user_id)
                                           <!--<div class="float-end">-->

                                           <!--<button class="btn-primary px-2 btn-sm border-0">Reply</button>-->
                                           <!--<button class="btn-info px-2 btn-sm border-0">Like</button>-->
                                           <!--</div>-->

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
          @foreach($previous as $latest_post_item)
                           <div class="">

                               <small class="card-text mt-0 text-muted float-start">Previous Article</small><br>
                               <div class="row mb-2 rela">
                                   <div class="col-3 pr-md-0 d-md-block d-none">

                                       <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark w-100">

                                           <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60 rounded-0" alt="..." style="border-radius: 0 !important">
                                       </a>

                                   </div>
                                   <div class="col-md-9">
                                   <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                                 
                      <h6 class="mb-2">
                           {{$latest_post_item->name}}
                       </h6>
                      </a>
                      <br>
                   <div>   <small class="card-text my-2"> By {{$latest_post_item->user->name}} </small></div>

                                   </div>
                               </div>
                           </div>
                   @endforeach
                </div>
         @foreach($next as $latest_post_item)
         <div class="col-6 shadow-sm">
                      <small class="card-text mt-0 text-muted float-end">Next Article</small> <br>
       <div class="row mb-2 rela">
                      <div class="col-md-9">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark">

                      <h6 class="mb-2">
                           {{$latest_post_item->name}}
                       </h6>
                      </a>
                      <br>
                   <div>   <small class="card-text my-2"> By {{$latest_post_item->user->name}} </small></div>


                      </div>
                      <div class="col-3 pr-md-0 d-md-block d-none">
                      <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-dark w-100">
 <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid rounded-start w-100 h60 rounded-0" alt="..." style="border-radius: 0 !important">
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
.post-img{
    display: block !important;
}
p {
    margin: 0;
    padding: 0;
    font-size: 18px;
    line-height: 24px;
    font-family: Viral-Text !important;
    opacity: 1;
    color: #1b1b1b;
    font-weight: 400;
    margin-bottom: 18px;
}
.comment .h60 {
    height: 70px;
    object-fit: cover;
    border-radius: 044 !important;
    /* width: 70px !important; */
}
.content-body figure
.paragraph-style
{
    font-size: 20px;line-height: 35px;font-family:Viral-Text !important
}
       </style> 
               <h6 class="titles wow zoomIn mt-4 cat-title px-2 mb-2 shadow" data-wow-delay=".2s">Related Posts</h6>

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
                                <small class="card-text"> By {{$latest_post_item->user->name}} </small>

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

                               <small class="card-text mt-0 text-muted float-start">About Author</small><br>
                               <div class="row mb-2 rela w-75">
                                   <div class="col-3 col-md-2 pr-md-0">
                                   
        <img src="{{asset('uploads/users/'.$post->user->image)}}" class="img-fluid rounded-start w-100 h60" alt="{{$post->category->name}}">

                                   </div>
                                   <div class="col-9 col-md-10">
                                       <strong class="card-text text-dark  mb-2">
                                          
                                            {{$post->user->name}} : 
                                               {{$post->user->role_as == '1' ? 'Editor':'User'}} Viral News
                                         </strong>


                                           <p class="mb-0">
                                            {{$post->user->description}} 
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
                <div class="card border-0">
                    
                    <div class="card-body pt-3">
                        
                    <h6 class="titles wow zoomIn cat-title px-2 mb-3 shadow" data-wow-delay=".2s">Latest Posts</h6>

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

                      <small class="card-text mt-0 text-muted"> By {{$latest_post_item->user->name}} </small>

                      </div>
                  </div>
                        @endforeach
                            <div class="card border-0 border-bottom  my-3">
 
        <h6 class="titles wow zoomIn mt-4 cat-title px-2 mb-2" data-wow-delay=".2s">Read Also</h6>
  <ul class="list-group list-group-flush">
      
                                    @foreach($related_posts as $post)
    <li class="list-group-item  ps-0">  
                    <a href="{{url('article/'.$post->category->slug.'/'.$post->slug)}}" class="w-100 text-dark">
                       >  {{Str::limit($post->name, 63)}}
                        </a>
                        </li> 
                        
@endforeach
  </ul>
  
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
                    <h6 class="titles wow zoomIn cat-title px-2 mb-3 shadow" data-wow-delay=".2s">Most Read</h6>

                        @foreach ($most_read as $latest_post_item)

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

                      <small class="card-text mt-0 text-muted"> By {{$latest_post_item->user->name}} </small>

                      </div>
                  </div>
                        @endforeach
                    </div>
                    
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
                <div class="mt-2">
                    <div class="single-table wow fadeInUp mt-2 rounded-0" data-wow-delay=".2s">
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
</section>

<section id="features" class="features bg-light pt-4">
        <div class="container">
        <h6 class="titles wow zoomIn mt-4 cat-title px-2 mb-2" data-wow-delay=".2s">Trending Posts</h6>
        <div class="row g-2">
        @foreach($most_read as $latest_post_item)
        <div class="col-md-3 mb-3">
                    <div class="single-table wow fadeInUp mt-2 shadow-sm bg-white" data-wow-delay=".2s">
                        <div class="table-content">
                    <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100 text-dark">

                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <div class="table-content">
                                <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="h180 img-fluid w-100" alt="...">
                            <div class="card-body">

                            <h6 class="mb-2">{{Str::limit($latest_post_item->name, 63)}}</h6>
                                                                  <small class="card-text mt-0 text-muted"> By {{$latest_post_item->user->name}} </small>

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

                      <small class="card-text mt-0 text-muted"> By {{$latest_post_item->user->name}} </small>

                      </div>
                  </div>
@endforeach
        </div>
        
        
@endsection

<style>
.content-body, p {
    margin: 0;
    padding: 0;
    font-size: 19px !important;
    line-height: 24px !important;
    font-family: Viral-Text !important;
    opacity: 1;
    color: #363636;
    font-weight: 500;
    margin-bottom: 18px;
    letter-spacing: 0.21px;
    opacity: 1;
} p span {
    margin: 0;
    padding: 0;
    font-size: 19px !important;
    line-height: 24px !important;
    font-family: Viral-Text !important;
    opacity: 1;
    color: #363636;
    font-weight: 500;
    letter-spacing: 0.21px;
    opacity: 1;
}
/*p span:first-child {*/*/
/*    border:none;*/
/*    font-family:Georgia, "Times New Roman", Times, serif;*/
/*    quotes: "\201C""\201D""\2018""\2019";*/
/*}*/

/*p span:first-child {*/
/*    font-size: 27px !important;*/
/*    font-style: italic;*/
/*    line-height: 35px;*/
/*}*/

/*p span:first-child:before { */
/*content: open-quote;*/
/*font-weight: bold;*/
/*font-size:50px;*/
/*color:#f9d441;*/
/*} */
/*p span:first-child:after { */
/*content: close-quote;*/
/*font-weight: bold;*/
/*font-size:50px;*/
/*color:#f9d441;*/
  
/*}
</style>
