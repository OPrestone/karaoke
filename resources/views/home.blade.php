@extends('layouts.app')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')
     <div  id="content-page" class="content-page p-0">

     <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title d-flex justify-content-between w-100">
                           <h4 class="card-title">Upcoming Events</h4>
                           <div class="d-flex align-items-center iq-view">
                              <b class="mb-0 text-primary"><a href="latest.html">View More <i class="las la-angle-right"></i></a></b>
                           </div>
                        </div>
                      </div>
                     <div class="iq-card-body">
                        <div class="row">
                        @foreach ($events->slice(0, 4) as $item)
                           <div class="col-3">
                              <a href ="music-player.html">
                                 <div class="date">
                                    <button class="btn"><b>29th Jun</b></button>
                                    <button class="btn bg"><b>Entry:</b> 3,000</button>
                                 </div>
                                 <img src="{{asset('uploads/events/'.$item->image)}}" class="img-border-radius img-fluid w-100 ratio115" alt="">
                                 <div class="reg-btns d-flex justify-content-around">
                                    <button class="btn">Register to Sing</button>
                                    <button class="btn bg">Register to Vote</button>
                                 </div>
                              </a>
                           </div>
                        @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-card iq-realease">
                     <div class="iq-card-header d-flex justify-content-between border-0">
                        <div class="iq-header-title">
                           <h4 class="card-title">Top Trial Songs</h4>
                        </div>
                     </div>
                     <div class="iq-card-body  iq-realeses-back">
                        <div class="row">
                           <div class="col-lg-5 iq-realese-box ">
                              <div class="iq-music-img">
                                 <div class="equalizer">
                                    <span class="bar bar-1"></span>
                                    <span class="bar bar-2"></span>
                                    <span class="bar bar-3"></span>
                                    <span class="bar bar-4"></span>
                                    <span class="bar bar-5"></span>
                                 </div>
                              </div>
                              <div class="player1 row">
                                 <div class="details1 music-list col-6 col-sm-6 col-lg-6">
                                    <div class="now-playing1"></div>
                                    <div class="track-art1"></div>
                                    <div>
                                       <div class="track-name1">Amy Winehouse </div>
                                       <div class="track-artist1">DaBaby Featuring Roddy</div>
                                    </div>
                                 </div>
                                 <div class="buttons1 col-6 col-sm-2 col-lg-3">
                                    <div class="prev-track1" onclick="prevTrack1()"><i class="fa fa-step-backward fa-2x"></i></div>
                                    <div class="playpause-track1" onclick="playpauseTrack1()"><i class="fa fa-play-circle fa-3x"></i></div>
                                    <div class="next-track1" onclick="nextTrack1()"><i class="fa fa-step-forward fa-2x"></i></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-7">
                              <ul class="list-unstyled iq-song-slide mb-0 realeases-banner">
                                @foreach ($songs->slice(0, 12) as $item)
                                <li class="row">
                                    <div class="d-flex justify-content-between align-items-center">
                                       <div class="media align-items-center col-10 col-md-5">
                                          <div class="iq-realese-song ">
                                             <a href ="music-player.html"><img src="{{$item->image_url}}" class="img-border-radius avatar-60 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white ml-3">
                                             <p class="mb-0 iq-music-title">{{$item->name}} </p>
                                             <small>{{$item->artist}}</small>
                                          </div>
                                       </div>
                                       <p class="mb-0 col-md-2 iq-m-time">6:18</p>
                                       <p class="mb-0 col-md-2 iq-m-icon"><i class="lar la-star font-size-20"></i></p>
                                       <p class="mb-0 col-2 col-md-2"><i class="las la-play-circle font-size-32"></i></p>
                                       <div class="iq-card-header-toolbar iq-music-drop d-flex align-items-center col-md-1">
                                          <div class="dropdown">
                                             <span class="dropdown-toggle text-primary" id="dropdownMenuButton4" data-toggle="dropdown" aria-expanded="false" role="button">
                                                <i class="ri-more-2-fill text-primary"></i>
                                             </span>
                                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4" style="">
                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                @endforeach

                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                           <h4 class="card-title">Featured Albums</h4>
                        </div>
                        <div id="feature-album-slick-arrow" class="slick-aerrow-block"></div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row  feature-album iq-box-hover mb-0">
                            @foreach ($songs->slice(22, 6) as $item)
                            <li class="col-lg-2  iq-music-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <div class="iq-music-overlay"></div>
                                       <a href ="music-player.html">
                                          <img src="images/dashboard/feature-album/01.png" class="img-border-radius img-fluid w-100" alt="">
                                       </a>
                                       <div class="overlay-music-icon">
                                          <a href ="music-player.html">
                                             <i class="las la-play-circle"></i>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="feature-list text-center">
                                       <h6 class="font-weight-600 mb-0">{{$item->song_genres}}</h6>
                                       <p class="mb-0">Annie Lennox</p>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                           <h4 class="card-title">Featured Artists</h4>
                        </div>
                        <div id="feature-album-artist-slick-arrow" class="slick-aerrow-block"></div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row feature-album-artist mb-0">

                        @foreach ($artists->slice(0, 8) as $item)
                        <li class="col-lg-2  iq-music-box">
                            <div class="iq-thumb-artist">
                                <div class="iq-music-overlay"></div>
                                <a href ="music-player.html">
                                <img src="{{$item->image_url}}" class="w-100 img-fluid" alt="">
                                </a>
                            </div>
                            <div class="feature-list text-center">
                                <h6 class="font-weight-600  mb-0">{{$item->name}}</h6>
                            </div>
                        </li>
                        @endforeach

                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Trending Songs</h4>
                        </div>
                        <div class="d-flex align-items-center iq-view">
                           <b class="mb-0 text-primary"><a href="albums.html">View More <i class="las la-angle-right"></i></a></b>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row iq-box-hover mb-0">

                        @foreach ($songs->slice(10, 12) as $item)
                           <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                              <div class="iq-card">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <div class="iq-music-overlay"></div>
                                       <a href ="music-player.html">
                                          <img src="{{$item->image_url}}" class="img-border-radius img-fluid w-100" alt="">
                                       </a>
                                       <div class="overlay-music-icon">
                                          <a class="song-row" data-src="{{ $item->preview_url }}">
                                             <i class="las la-play-circle"></i>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="feature-list text-center">
                                       <h6 class="font-weight-600  mb-0">{{$item->name}}</h6>
                                       <p class="mb-0">{{$item->artist}}</p>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Popular Afrobeat Songs</h4>
                        </div>
                        <div class="d-flex align-items-center iq-view">
                           <b class="mb-0 text-primary"><a href="albums.html">View More <i class="las la-angle-right"></i></a></b>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row  iq-box-hover mb-0">

                        @foreach ($songs->slice(22, 6) as $item)
                           <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                              <div class="iq-card">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <div class="iq-music-overlay"></div>
                                       <a>
                                          <img src="{{$item->image_url}}" class="img-border-radius img-fluid w-100" alt="">
                                       </a>
                                       <div class="overlay-music-icon">
                                          <a class="song-row" data-src="{{ $item->preview_url }}">
                                             <i class="las la-play-circle"></i>
                                          </a>
                                       </div>
                                    </div>
                                    <div class="feature-list text-center">
                                       <h6 class="font-weight-600  mb-0">{{$item->name}}</h6>
                                       <p class="mb-0">{{$item->artist}}</p>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-lg-6 col-md-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between align-items-center">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Hot Songs</h4>
                              </div>
                              <div id="hot-song-slick-arrow" class="slick-aerrow-block"></div>
                           </div>
                           <div class="iq-card-body">
                              <ul class="list-unstyled row hot-songs mb-0">
                        @foreach ($songs->slice(22, 6) as $item)
                                 <li class="col-lg-12">
                                    <div class="iq-card iq-card-transparent">
                                       <div class="iq-card-body p-0">
                                          <div class="media align-items-center">
                                             <div class="iq-thumb-hotsong">
                                                <div class="iq-music-overlay"></div>
                                                <a href ="music-player.html"><img src="{{$item->image_url}}"  class="img-fluid avatar-60" alt="">
                                                </a>
                                                <div class="overlay-music-icon">
                                                   <a href ="music-player.html">
                                                      <i class="las la-play-circle font-size-24 song-row" data-src="{{ $item->preview_url }}"></i>
                                                   </a>
                                                </div>
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 iq-song-title">{{$item->name}}</h6>
                                                <small>{{$item->artist}}</small>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                        @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between align-items-center">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Hot Video Songs</h4>
                              </div>
                              <div id="hot-video-slick-arrow" class="slick-aerrow-block"></div>
                           </div>
                           <div class="iq-card-body">
                              <ul class="list-unstyled row iq-box-hover hot-video mb-0">
                                 <li class="col-lg-6">
                                    <div class="iq-card  mb-lg-0">
                                       <div class="iq-card-body p-0">
                                          <div class="iq-thumb">
                                             <video  controls>
                                                <source src="images/dashboard/song-video/video-1.mp4" type="video/mp4" />
                                             </video>
                                          </div>
                                          <div class="feature-list text-center">
                                             <h6 class="font-weight-600  mb-0">Chicago Freestyle</h6>
                                             <p class="mb-0">389382k Views</p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>

                        @foreach ($songs->slice(22, 6) as $item)
                                 <li class="col-lg-6">
                                    <div class="iq-card  mb-lg-0">
                                       <div class="iq-card-body p-0">
                                          <div class="iq-thumb">
                                             <video  controls>
                                                <source src="images/dashboard/song-video/video-1.mp4" type="video/mp4" />
                                             </video>
                                          </div>
                                          <div class="feature-list text-center">
                                             <h6 class="font-weight-600  mb-0">{{$item->name}}</h6>
                                             <p class="mb-0">389382k Views</p>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                        @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

        @foreach ($songs->slice(8, 514) as $item)
        <div class="d-flex col-12 justify-content-between mb-2 d-md-none">
            <div class="d-flex">

                <div class= "playing song-row" data-src="{{ $item->preview_url }}">
                    <img src="{{$item->image_url }}" height="35" class="ratio11 mr-2" style="object-fit: cover;" alt="">
                    <a class="ply song-row" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i></a>
                </div>

                <div> <a class="text-light" href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                         {{$item->name}}{{$item->track_name}}
                                    </a>  <small class="d-flex justify-content-between"><div href="">{{$item->artist}}</div> </small></div>
                                            </div>
            <div class="">
                <a class="text-white btn btn-bg" href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}"> Lyrics</a>
             </div>
        </div>
        @endforeach
        <div class="d-none d-md-block mb-5">
						<div class="col-12 iq-card">
                            <div class="iq-card-header d-flex justify-content-between align-items-center">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Hot Songs</h4>
                              </div>
                              <div id="hot-song-slick-arrow" class="slick-aerrow-block"></div>
                           </div>
									<table id="datatables-buttons" class="table" style="width:100%">
										<thead class="sticky-top">
											<tr>
                                                <tr> <th></th>
                                                    <th>
                                                        IMG
                                                    </th>
                                                    <th>Song Name</th>
                                                    <th>Artist</th>
                                                    <th>Album</th>
                                                    <th>
                                                    Duration
                                                    </th>
                                                    <th>
                                                    Popularity
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
											</tr>
										</thead>
										<tbody>
                                        @foreach ($songs->slice(4, 514) as $item)
<tr>
    <td class="song-row" data-src="{{ $item->preview_url }}"><i class="fa fa-play"></i></td>
    <td>
        <img src="{{$item->image_url }}" height="40" class="ratio11" style="object-fit: cover;" alt="">
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->artist}}</td>
    <td>{{$item->album}}</td>
    <td>{{ gmdate('i:s', $item->duration_ms / 1000) }}</td>
    <td>{{$item->popularity}}</td>
    <td>
        <div class="ml-auto text-right align-self-center">
            <a href="{{url('video/'.$item->id.'/'.$item->name.''.$item->track_name)}}" type="submit" class="btn btn-danger btn-sm">Lyrics</a>
        </div>
    </td>
</tr>
@endforeach
										</tfoot>
									</table>
								</div>

								</div>
								</div>

<div class="my-4">
    .
</div>
@endsection
