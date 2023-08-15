@extends('layouts.dash')

@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")

@section('content') 
<main class="content"> 
    <div class="container-fluid p-0">
        <div class="row">  
            <div class="col-12 d-flex"> 
                <div class="card flex-fill">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-3 me-auto">
                                <div class="d-inline-block" style="position: relative;">
                                <img src="{{$song->image_url}}" class="ratio11 w-100" style="object-fit: cover;" alt="">
                                    <i class="fa fa-play text-white" style="position: absolute; bottom: 0%; right: 0%; transform: translate(-50%, -50%); border-radius: 50%; border: 2px solid #fff; font-size: 22px; width: 40px; height: 40px; line-height: 40px; text-align: center; padding: 9px;"></i>
                                </div>
                            </div>
                            <div class="ml-2 align-self-end">
                                <h1 class="mb-2">{{$song->name}}{{$song->track_name}} </h1>
                                <div class="mb-0">{{$song->artist}} <i class="fa fa-circle" style="font-size: 5px; margin-bottom: 2px;"></i> {{ gmdate('i:s', $song->duration_ms / 1000) }}</div> 
                                <div class="d-flex mt-4">
                                    <div class="text-center">
                                        <a href="{{url('video/'.$song->id.'/'.$song->name.''.$song->track_name)}}">
                                        <h5>
                                            <i class="fa fa-microphone"></i><br> Practise
                                        </h5>
                                    </a>
                                    </div>
                                    <div class="text-center mx-4">
                                        <h5 class="text-danger">
                                            <i class="fa fa-video"></i><br> Go Live
                                        </h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>
                                            <i class="fa fa-microphone"></i><br> Record
                                        </h5>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        
        <h3>Top Videos For {{$song->name}}{{$song->track_name}}</h3>
        <div class="row">
        @foreach ($allsongs->slice(1, 4) as $item)
                 @include('components._video_square_card')
        @endforeach
        </div>
        <h3>Related Songs</h3>
        <div class="row"> 
                        @foreach ($allsongs as $item) 
                                @include('components._song_card')
                        @endforeach
        </div>  
    </div>
</main>
            @include('components._player') 
@endsection
