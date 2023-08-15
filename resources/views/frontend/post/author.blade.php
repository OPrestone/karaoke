@extends('layouts.app')
@section('title', " ")

@section('content')
<div class="container shadow-sm bg-white p-3">
    
<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> / 
           

</div>
</div>
<section class="py-4">
<div class="container">
    <h5 class="catname">
    </h5> 
    <div class="row my-4">
    <div class="row g-1 mx-0 mb-0">
            @foreach($posts as $latest_post_item)
            <div class="col-md-6">
         
         <div class=" ">
             <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100">
             <div class="card border-0 text-white">
             <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid w-100 h300" alt="...">
           <div class="card-img-overlay">
       <h5 class="mb-2 bg-danger text-white px-2" style="width: max-content;">{{$latest_post_item->category->name}}</h5>
               <h5 class="card-title text-white"><b>{{$latest_post_item->name}}</b></h5>
            
               <p class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </p>
           </div>
           </div>
             </a>
           </div>
            </div>
            
        @endforeach
        </div>      
        <div class="row g-1 mx-0 mt-0 pt-0">
            @foreach($post as $latest_post_item)
            <div class="col-md-4">
         
         <div class=" ">
             <a href="{{url('article/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="w-100">
             <div class="card border-0 text-white">
             <img src="{{asset('uploads/posts/'.$latest_post_item->image)}}" class="img-fluid w-100 h180" alt="...">
           <div class="card-img-overlay">
       <p class="mb-2 bg-danger text-white px-2" style="width: max-content;">{{$latest_post_item->category->name}}</p>
               <h6 class="card-title text-white"><b>{{$latest_post_item->name}}</b></h6>
              
               <p class="card-text">{{$latest_post_item->created_at->diffForHumans()}} | By {{$latest_post_item->user->name}} </p>
           </div>
           </div>
             </a>
           </div>
            </div>
                    @endforeach
        </div>
    </div>
</div>
</section>


@endsection