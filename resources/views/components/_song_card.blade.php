                 <div class="col-12 col-md-4 d-flex">
                    <div class="card flex-fill song-card">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between">
                                <div class="me-auto">
                                    <a href="#" onclick="playVideo('{{$item->youtube_id}}', '{{$item->name}}{{$item->track_name}}'); return false;">
                                        <div class="d-inline-block" style="position: relative;">
                                            <img src="{{$item->image_url}}" class="ratio11 w-100" height="50" style="object-fit: cover;" alt="">
                                            <i class="fa fa-play text-white" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border-radius: 50%; border: 2px solid #fff; font-size: 18px; width: 30px; height: 30px; line-height: 30px; text-align: center; padding: 5px;"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <a href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                        <h5 class="mb-2">{{$item->name}}{{$item->track_name}}</h5>
                                    </a>
                                    <div class="mb-0">{{$item->artist}}</div>
                                </div>
                                <div class="ml-auto text-right align-self-center">
                                    <a href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}" type="submit" class="btn btn-danger btn-sm">Lyrics</a>
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
