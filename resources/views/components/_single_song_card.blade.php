                 <div class="col-12 d-flex">
                    <div class="flex-fill song-card">
                        <div class="card-body p-2">
                            <div class="d-flex">
                                <div class=" ">
                                    <a href="#" class="song-row" data-src="{{ $item->preview_url }}">
                                        <div class="d-inline-block" style="position: relative;">
                                            <img src="{{$item->image_url}}" class="ratio11 w-100" height="40" style="object-fit: cover;" alt="">
                                         </div>
                                    </a>
                                </div>
                                <div class="px-1 align-self-center">
                                    <a href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                        <h5 class="mb-2">{{$item->name}}{{$item->track_name}}</h5>
                                    </a>
                                    <div class="mb-0">{{$item->artist}}</div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <style>
                    .btn:not(:disabled):not(.disabled) {
                        cursor: pointer;
                        white-space: nowrap;
                    }
                </style>
 