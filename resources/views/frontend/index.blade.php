@extends('layouts.dash')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h3>Trending Songs</h3>
        <div class="row">
            @foreach ($allsongs->slice(0, 4) as $item)
            @include('components._video_square_card')
            @endforeach
        </div> 
 

        <div class="row">
        @foreach ($allsongs as $item)
            @include('components._song_card')
        @endforeach
        </div>  
            @include('components._player') 

@endsection
