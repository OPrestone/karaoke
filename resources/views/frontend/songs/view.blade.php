@extends('layouts.frontend')
@section('title', "meta_title")
@section('meta_description', "meta_description")
@section('meta_keyword', "meta_keyword")
@section('content')

<main class="content  ">

    <div class=" p-0">
        <div class="text-center d-md-none pb-3" style="position: relative;background: linear-gradient(0deg, black, black, black, black, black, black, #62002717, #6200276b, #e90f667d);">
        <div class="d-inline-block col-8 mx-auto">
                                <img src="{{$song->image_url}}" class="ratio11 w-100" style="object-fit: cover;" alt="">
                                    <i class="fa fa-play text-white" style="position: absolute; bottom: 0%; right: 0%; transform: translate(-50%, -50%); border-radius: 50%; border: 2px solid #fff; font-size: 22px; width: 40px; height: 40px; line-height: 40px; text-align: center; padding: 9px;"></i>
                                </div>
                                <h2 class="my-1 px-2">{{$song->name}}{{$song->track_name}} </h2>
                                <h5 class="text-muted">{{$song->artist}}</h5>
                                <div class="d-flex my-3 justify-content-center">
                                    <div class="text-center">
                                        <a href="{{url('video/'.$song->id.'/'.$song->name.''.$song->track_name)}}">
                                        <h5>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
  <path d="M15.0007 17.5C17.0757 17.5 18.7507 15.825 18.7507 13.75V6.25C18.7507 4.175 17.0757 2.5 15.0007 2.5C12.9257 2.5 11.2507 4.175 11.2507 6.25V13.75C11.2507 15.825 12.9257 17.5 15.0007 17.5ZM22.3882 13.75C21.7757 13.75 21.2632 14.2 21.1632 14.8125C20.6507 17.75 18.0882 20 15.0007 20C11.9132 20 9.35072 17.75 8.83822 14.8125C8.79413 14.5185 8.64649 14.2499 8.4219 14.0551C8.1973 13.8603 7.91052 13.7521 7.61322 13.75C6.85072 13.75 6.25072 14.425 6.36322 15.175C6.97572 18.925 9.97572 21.8625 13.7507 22.4V25C13.7507 25.6875 14.3132 26.25 15.0007 26.25C15.6882 26.25 16.2507 25.6875 16.2507 25V22.4C18.0901 22.1372 19.7979 21.2951 21.1263 19.996C22.4547 18.6968 23.3346 17.0081 23.6382 15.175C23.7632 14.425 23.1507 13.75 22.3882 13.75Z" fill="white"/>
</svg><br> Lyrics
                                        </h5>
                                    </a>
                                    </div>
                                    <div class="text-center mx-4">
                                        <h5 class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
  <path d="M7.5 20H17.5V19.3125C17.5 18.3958 17.0417 17.6563 16.125 17.0938C15.2083 16.5313 14 16.25 12.5 16.25C11 16.25 9.79167 16.5313 8.875 17.0938C7.95834 17.6563 7.5 18.3958 7.5 19.3125V20ZM12.5 15C13.1875 15 13.7763 14.755 14.2663 14.265C14.7563 13.775 15.0008 13.1867 15 12.5C15 11.8125 14.755 11.2238 14.265 10.7338C13.775 10.2438 13.1867 9.99917 12.5 10C11.8125 10 11.2238 10.245 10.7338 10.735C10.2438 11.225 9.99917 11.8133 10 12.5C10 13.1875 10.245 13.7763 10.735 14.2663C11.225 14.7563 11.8133 15.0008 12.5 15ZM5 25C4.3125 25 3.72375 24.755 3.23375 24.265C2.74375 23.775 2.49917 23.1867 2.5 22.5V7.5C2.5 6.8125 2.745 6.22375 3.235 5.73375C3.725 5.24375 4.31334 4.99917 5 5H20C20.6875 5 21.2763 5.245 21.7663 5.735C22.2563 6.225 22.5008 6.81334 22.5 7.5V13.125L27.5 8.125V21.875L22.5 16.875V22.5C22.5 23.1875 22.255 23.7763 21.765 24.2663C21.275 24.7563 20.6867 25.0008 20 25H5Z" fill="#E90E66"/>
</svg><br> Go Live
                                        </h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
  <path d="M24.9375 19.9375L23 18C23.9167 17.1458 24.6354 16.1354 25.1562 14.9688C25.6771 13.8021 25.9375 12.5625 25.9375 11.25C25.9375 9.9375 25.6771 8.70833 25.1562 7.5625C24.6354 6.41667 23.9167 5.41667 23 4.5625L24.9375 2.5625C26.1042 3.66667 27.0312 4.96875 27.7188 6.46875C28.4062 7.96875 28.75 9.5625 28.75 11.25C28.75 12.9375 28.4062 14.5312 27.7188 16.0312C27.0312 17.5312 26.1042 18.8333 24.9375 19.9375ZM20.9375 15.9375L18.9375 13.9375C19.3125 13.5833 19.6146 13.1821 19.8438 12.7338C20.0729 12.2854 20.1875 11.7908 20.1875 11.25C20.1875 10.7083 20.0729 10.2133 19.8438 9.765C19.6146 9.31667 19.3125 8.91583 18.9375 8.5625L20.9375 6.5625C21.6042 7.16667 22.125 7.87 22.5 8.6725C22.875 9.475 23.0625 10.3342 23.0625 11.25C23.0625 12.1667 22.875 13.0262 22.5 13.8287C22.125 14.6312 21.6042 15.3342 20.9375 15.9375ZM11.25 16.25C9.875 16.25 8.69792 15.7604 7.71875 14.7812C6.73958 13.8021 6.25 12.625 6.25 11.25C6.25 9.875 6.73958 8.69792 7.71875 7.71875C8.69792 6.73958 9.875 6.25 11.25 6.25C12.625 6.25 13.8021 6.73958 14.7812 7.71875C15.7604 8.69792 16.25 9.875 16.25 11.25C16.25 12.625 15.7604 13.8021 14.7812 14.7812C13.8021 15.7604 12.625 16.25 11.25 16.25ZM1.25 26.25V22.75C1.25 22.0625 1.42708 21.4167 1.78125 20.8125C2.13542 20.2083 2.625 19.75 3.25 19.4375C4.3125 18.8958 5.51042 18.4375 6.84375 18.0625C8.17708 17.6875 9.64583 17.5 11.25 17.5C12.8542 17.5 14.3229 17.6875 15.6562 18.0625C16.9896 18.4375 18.1875 18.8958 19.25 19.4375C19.875 19.75 20.3646 20.2083 20.7188 20.8125C21.0729 21.4167 21.25 22.0625 21.25 22.75V26.25H1.25Z" fill="white"/>
</svg><br> Record
                                        </h5>
                                    </div>
                                </div>
                                 <div class="text-left col-12 d-none">
                                 <div>
                                        <a href="" class="text-light mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M10.416 12.5C10.9994 12.5 11.4924 12.2986 11.8952 11.8958C12.298 11.4931 12.4994 11 12.4994 10.4167V5.83334H14.166C14.4021 5.83334 14.6002 5.75334 14.7602 5.59334C14.9202 5.43334 14.9999 5.23556 14.9994 5.00001C14.9994 4.7639 14.9193 4.56584 14.7593 4.40584C14.5993 4.24584 14.4016 4.16612 14.166 4.16667H12.4994C12.2632 4.16667 12.0652 4.24667 11.9052 4.40667C11.7452 4.56667 11.6655 4.76445 11.666 5.00001V8.75001C11.4855 8.61112 11.291 8.50695 11.0827 8.43751C10.8744 8.36806 10.6521 8.33334 10.416 8.33334C9.83268 8.33334 9.33963 8.53473 8.93685 8.93751C8.53407 9.34028 8.33268 9.83334 8.33268 10.4167C8.33268 11 8.53407 11.4931 8.93685 11.8958C9.33963 12.2986 9.83268 12.5 10.416 12.5ZM6.66602 15C6.20768 15 5.81518 14.8367 5.48852 14.51C5.16185 14.1833 4.99879 13.7911 4.99935 13.3333V3.33334C4.99935 2.87501 5.16268 2.48251 5.48935 2.15584C5.81602 1.82917 6.20824 1.66612 6.66602 1.66667H16.666C17.1244 1.66667 17.5169 1.83001 17.8435 2.15667C18.1702 2.48334 18.3332 2.87556 18.3327 3.33334V13.3333C18.3327 13.7917 18.1694 14.1842 17.8427 14.5108C17.516 14.8375 17.1238 15.0006 16.666 15H6.66602ZM3.33268 18.3333C2.87435 18.3333 2.48185 18.17 2.15518 17.8433C1.82852 17.5167 1.66546 17.1244 1.66602 16.6667V5.83334C1.66602 5.59723 1.74602 5.39917 1.90602 5.23917C2.06602 5.07917 2.26379 4.99945 2.49935 5.00001C2.73546 5.00001 2.93352 5.08001 3.09352 5.24001C3.25352 5.40001 3.33324 5.59778 3.33268 5.83334V16.6667H14.166C14.4021 16.6667 14.6002 16.7467 14.7602 16.9067C14.9202 17.0667 14.9999 17.2645 14.9994 17.5C14.9994 17.7361 14.9193 17.9342 14.7593 18.0942C14.5993 18.2542 14.4016 18.3339 14.166 18.3333H3.33268Z" fill="#434343"/>
</svg> Add to library</a>
                                    </div>
                                    <div>
                                        <a href="" class="text-light mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M3.75001 14.5167L4.65001 15.4167L2.73335 17.3167C2.50001 17.5583 2.08335 17.5583 1.85001 17.3167C1.61668 17.075 1.60835 16.6667 1.85001 16.4333L3.75001 14.5167ZM15.2417 4.51666V3.33333L10 8.575L4.75835 3.33333V4.51666L9.40835 9.16666L6.25001 12.3417C5.26668 11.6417 3.90001 11.725 3.02501 12.6L6.56668 16.1417C7.44168 15.2667 7.52501 13.9 6.83335 12.9167L15.2417 4.51666ZM18.15 16.4333L16.25 14.5167L15.35 15.4167L17.2667 17.3167C17.5 17.5583 17.9167 17.5583 18.15 17.3167C18.3833 17.075 18.3917 16.6667 18.15 16.4333ZM13.75 12.3417L11.1833 9.75833L10.5917 10.35L13.175 12.9167C12.475 13.9 12.5583 15.2667 13.4333 16.1417L16.975 12.6C16.1 11.725 14.7333 11.6417 13.75 12.3417Z" fill="#434343"/>
</svg> Create Battle</a>
                                    </div>
                                    <div>
                                        <a href="" class="text-light mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M5.00065 19.1667C4.54232 19.1667 4.14982 19.0033 3.82315 18.6767C3.49649 18.35 3.33343 17.9578 3.33399 17.5V8.33333C3.33399 7.87499 3.49732 7.48249 3.82399 7.15583C4.15065 6.82916 4.54287 6.66611 5.00065 6.66666H7.50065V8.33333H5.00065V17.5H15.0007V8.33333H12.5007V6.66666H15.0007C15.459 6.66666 15.8515 6.83 16.1782 7.15666C16.5048 7.48333 16.6679 7.87555 16.6673 8.33333V17.5C16.6673 17.9583 16.504 18.3508 16.1773 18.6775C15.8507 19.0042 15.4584 19.1672 15.0007 19.1667H5.00065ZM9.16732 13.3333V4.02083L7.83399 5.35416L6.66732 4.16666L10.0007 0.833328L13.334 4.16666L12.1673 5.35416L10.834 4.02083V13.3333H9.16732Z" fill="#434343"/>
</svg> Share</a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-light mb-4"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M9.16667 11.6667C10 11.6667 10.875 11.8 11.8333 12.0333C11.1583 12.7583 10.8333 13.6083 10.8333 14.5833C10.8333 15.325 11.0417 16.025 11.4833 16.6667H2.5V15C2.5 14.0083 3.25833 13.2083 4.78333 12.6C6.30833 11.9833 7.775 11.6667 9.16667 11.6667ZM9.16667 10C8.26667 10 7.5 9.67501 6.81667 9.02501C6.15 8.37501 5.83333 7.59168 5.83333 6.66668C5.83333 5.76668 6.15 5.00001 6.81667 4.31668C7.5 3.65001 8.26667 3.33334 9.16667 3.33334C10.0917 3.33334 10.875 3.65001 11.525 4.31668C12.175 5.00001 12.5 5.76668 12.5 6.66668C12.5 7.59168 12.175 8.37501 11.525 9.02501C10.875 9.67501 10.0917 10 9.16667 10ZM15.4167 8.33334H18.3333V10H16.6667V14.5833C16.6667 15.1359 16.4472 15.6658 16.0565 16.0565C15.6658 16.4472 15.1359 16.6667 14.5833 16.6667C14.0308 16.6667 13.5009 16.4472 13.1102 16.0565C12.7195 15.6658 12.5 15.1359 12.5 14.5833C12.5 14.0308 12.7195 13.5009 13.1102 13.1102C13.5009 12.7195 14.0308 12.5 14.5833 12.5C14.8833 12.5 15.1583 12.5583 15.4167 12.675V8.33334Z" fill="#434343"/>
</svg> View Artist</a>
                                    </div>
                                 </div>
        </div>

    <div class="row d-none d-md-flex">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-3 me-auto">
                                <div class="d-inline-block" style="position: relative;">
                                <img src="{{$song->image_url}}" class="ratio11 w-100" style="object-fit: cover;" alt="">
                                    <i class="fa fa-play text-white song-row" data-src="{{ $song->preview_url }}" style="position: absolute; bottom: 0%; right: 0%; transform: translate(-50%, -50%); border-radius: 50%; border: 2px solid #fff; font-size: 22px; width: 40px; height: 40px; line-height: 40px; text-align: center; padding: 9px;"></i>
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
        <div class="row d-none d-md-flex">
            <div class="col-12">
                <h3 >Top Videos For {{$song->name}}{{$song->track_name}}</h3>
            </div>
        @foreach ($allsongs->slice(1, 4) as $item)
                 @include('components._video_square_card')
        @endforeach
        </div>
        <div class="col-12 mt-3"><h3>Related Songs</h3></div>
        @foreach ($allsongs->slice(8, 514) as $item)
        <div class="d-flex col-12 justify-content-between mb-2 d-md-none">
            <div class="d-flex">
            <div class= "playing song-row" data-src="{{ $item->preview_url }}">
                    <img src="{{$item->image_url }}" height="35" class="ratio11 mr-2" style="object-fit: cover;" alt="">
                    <a class="ply"><i class="fa fa-play"></i></a>
                </div>
                <div> <a class="text-light" href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
                                         {{$item->name}}{{$item->track_name}}
                                    </a>  <small class="d-flex justify-content-between"><div href="{{url('artist/'.$item->id.'/'.$item->name)}}">{{$item->artist}}</div> </small></div>
            </div>
            <div class="">
                <a class="text-white btn btn-bg" href="{{url('video/'.$song->id.'/'.$song->name.''.$song->track_name)}}"> Lyrics</a>
             </div>
        </div>
        @endforeach
        <div class="row ">
                        @foreach ($allsongs->slice(1, 14) as $item)
                <div class="col-12 d-none col-md-6 d-md-flex">
                    <div class="card flex-fill song-card">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between">
                                <div class="me-auto">
                                <div class= "playing song-row" data-src="{{ $item->preview_url }}">
                    <img src="{{$item->image_url }}" height="50" class="ratio11 w-100" style="object-fit: cover;" alt="">
                    <a class="ply"><i class="fa fa-play" style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    border: 2px solid #fff;
    font-size: 18px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    padding: 5px;"></i></a>
                </div>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <a href="{{url('view/song/'.$item->id.'/'.$item->name.''.$item->track_name)}}">
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
                         @endforeach
        </div>

<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>
@endsection

