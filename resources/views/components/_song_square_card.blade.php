<div class="col-6 col-md-3">
            <div class="card flex-fill song-card">
                    <div class="card-body p-2">
                                <div class="d-inline-block" style="position: relative;">
                                <img src="{{$item->image_url}}" class="ratio169 w-100" style="object-fit: cover;" alt="">
                                    <i class="fa fa-play text-white" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border-radius: 50%; border: 2px solid #fff; font-size: 18px; width: 30px; height: 30px; line-height: 30px; text-align: center; padding: 5px;"></i>
                                </div>
                            <a href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                <h5 class="my-2">{{$item->name}}{{$item->track_name}}</h5>
                            </a>
                                <div class="mb-0">{{$item->artist}} <i class="fa fa-circle" style="font-size: 5px; margin-bottom: 2px;"></i> {{ gmdate('i:s', $item->duration_ms / 1000) }}</div>
                    </div>
                </div>
            </div>
