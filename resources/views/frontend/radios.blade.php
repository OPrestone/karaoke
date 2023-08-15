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
                  <div class="row mb-2 rela pe-3">
                            @foreach ($radios as $radio)

                      <div class="col-md-3 pr-md-0">
                    

                      <h6 class="mb-0 text-dark">
                           {{$radio->name}}
                       </h6>
                       <audio controls> 
  <source src="{{ strip_tags($radio->stream_link)}}" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>
                      
                      </div>
                        @endforeach
                  </div>
</div>

@endsection
