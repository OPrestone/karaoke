
<body>
  <header class="topbar d-none">
      <div class="mx-md-5">
        <div class="row">
          <!-- social icon-->
          <div class="justify-content-between">
            <span class="time mt-2">
            <?php 
            $date = Carbon\Carbon::now();
            $date->setTimezone(new DateTimeZone('Africa/Nairobi')); 
            echo "<small class='text-light'>".date('l\, F jS\, Y ')."</small>";


            ?>
            </span>
            <ul class="social-network">
              <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-whatsapp"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-youtube"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
  </header>
  
<div id="mobile" class="demo1">
         <ul class="navbar-nav ml-auto" id="nav">

        @php
          $categories = App\Models\Category::where('navbar_status', '0')->where('status','0')->get();
        
          @endphp
          @foreach ($categories as $cateitem)
        <li class="nav-item m-0">
          <a class="nav-link  {{ Request::is('iscategory/'.$cateitem->slug) ? 'active' : ''}}" aria-current="page" href="{{ url('iscategory/'.$cateitem->slug) }}">
                    {{$cateitem->name}}</a>
        </li>
        @endforeach
        <li class="nav-item m-0">
          <a class="nav-link  {{ Request::is('/videos') ? 'active' : ''}}" aria-current="page" href="{{ url('/videos') }}">
          <i class="btn-material fa fa-play"></i>
  Videos</a>
        </li>
        <li class="nav-item m-0">
                  
       <a href="#search">
                  <i class="btn-material fa fa-search"></i>
                </a>
              </li>
  </ul>
<div class="sticky-top zindex mt-0 shadow-sm">
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear p-0">
    <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{ asset('assets')}}/images/download.png" class="w-75 logo  {{ Request::is('/') ? 'd-block' : 'd-none'}}" alt="">

            @php
          $categories = App\Models\Category::where('navbar_status', '0')->where('status','0')->get();
        
          @endphp
          @foreach ($categories as $cateitem)
          <img src="{{ asset('assets')}}/images/{{$cateitem->name}}.png" class="w-75 {{ Request::is('iscategory/'.$cateitem->slug) ? 'd-block' : 'd-none'}}" alt="">
        @endforeach
      
        
              </a>
                  <button class="navbar-toggler" type="button" >
  <div id="burgerBtn" class="zindex"></div>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
        @php
          $categories = App\Models\Category::where('navbar_status', '0')->where('status','0')->get();
        
          @endphp
          @foreach ($categories as $cateitem)
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('iscategory/'.$cateitem->slug) ? 'active' : ''}}" aria-current="page" href="{{ url('iscategory/'.$cateitem->slug) }}">
                    {{$cateitem->name}}</a>
        </li>
        @endforeach  
        <li class="nav-item">
        <a class="nav-link  {{ Request::is('/videos') ? 'active' : ''}}" aria-current="page" href="{{ url('/videos') }}">
  Videos</a>
        </li>
              <li class="nav-item">
 
                       @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">          
                                      <i class="btn-mate fa fa-user"></i>                     
                                       {{ __('Login') }}</a>
                                </li>
             <li class="nav-item">
                  
       <a href="#search">
                  <i class="btn-material fa fa-search"></i>
                </a>
              </li>
                            @endif
                            

                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else
             <li class="nav-item">
                  
       <a href="#search">
                  <i class="btn-material fa fa-search"></i>
                </a>
              </li>
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <img src="{{asset('uploads/users/'.Auth::user()->image)}}"  width="20" alt="{{ Auth::user()->name }}"  style="margin-right: 4px;
                                            border-radius: 50%;
                                            width: 25px;
                                            height: 25px;
                                            object-fit: cover;">                      
                                 {{ Auth::user()->name }}
    
    <img src="{{ Auth::user()->image }}" alt="">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                         Admin Dashboard 
                                    </a>
                                    <a class="dropdown-item mt-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>
       
      </div>
    </div>
  </nav>
</div>
<style>
.navbar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 5px;
}
.navbar
.container {
    max-width: 1290px;
}
.d-block.d-none{
  display: block !important;
}
/*
headeer top
*/
.topbar{
  background-color: #01080f;
  padding: 0;
}
.navbar-nav .nav-item {
    z-index: 1;
    position: relative;
    margin-right: 14px;
    align-self: center;
    line-height: 1;
}

.topbar .container .row {
  margin:-7px;
  padding:0;
}

.topbar .container .row .col-md-12 { 
  padding:0;
}

.topbar p{
  margin:0;
  display:inline-block;
  font-size: 13px;
  color: #f1f6ff;
}

.topbar p > i{
  margin-right:5px;
}
.topbar p:last-child{
  text-align:right;
} 

header .navbar {
    margin-bottom: 0;
}

.topbar li.topbar {
    display: inline;
    padding-right: 18px;
    line-height: 52px;
    transition: all .3s linear;
}

.topbar li.topbar:hover {
    color: #1bbde8;
}

.topbar ul.info i {
    color: #131313;
    font-style: normal;
    margin-right: 8px;
    display: inline-block;
    position: relative;
    top: 4px;
}
.topbar a {
    color: #fff;
}
.topbar ul.info li {
    float: right;
    padding-left: 30px;
    color: #ffffff;
    font-size: 13px;
    line-height: 44px;
}

.topbar ul.info i span {
    color: #aaa;
    font-size: 13px;
    font-weight: 400;
    line-height: 50px;
    padding-left: 18px;
}

ul.social-network {
  border:none;
  margin:0;
  padding:0;
}

ul.social-network li {
  border:none;  
  margin:0;
}

ul.social-network li i {
  margin:0;
}

ul.social-network li {
    display:inline;
    margin: 0 5px;
    border: 0px solid #2D2D2D;
    padding: 5px 0 0;
    width: 32px;
    display: inline-block;
    text-align: center;
    vertical-align: baseline;
    color: #000;
}

ul.social-network {
  list-style: none;
  margin: 0;
  float: right;
}
.navbar-dark .navbar-nav .nav-link {
    font-family: Viral-nav;
    text-transform: uppercase;
    color: #fff;
}
.navbar-dark .navbar-nav .nav-link.active {
    font-family: Viral-nav;
    text-transform: uppercase;
    color: #f9d441;
}
.bg-dark {
    background-color: #222!important;
}

.mx-background-top-linear {
    background: -webkit-linear-gradient(45deg, #54d400 11%, #1b1e21 26%);
    background: -webkit-linear-gradient(left, #54d400 11%, #1b1e21 26%);
    background: linear-gradient(76deg, #000 98%, #040707 98%);
}
.time{
    vertical-align: -webkit-baseline-middle;
}
</style>

<div id="search" style="z-index: 9999;">
    <button type="button" class="close">×</button>
    <form class="nav-link search" action="{{ route('search') }}" method="GET">
    <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
      <input type="search" class="border-0" name="search" required placeholder="Type to search...">
  
        <input type="submit" class="btn btn-primary">
</form>
</div>
