@extends('layouts.app') 

@section('content')
@include('layouts.inc.category-navbar')


<div class="container shadow-sm bg-white p-3">
    
<div class="breadcrumb mb-0">
<a class="pr-1" href="{{url('/')}}">Home </a> /  
</div>
</div>
<div class="container">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2445563419404346"
     crossorigin="anonymous"></script>
<!-- vert ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2445563419404346"
     data-ad-slot="9378570062"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<section id="features" class="features pb-5">
        <div class="container">            
            <h6 class="titles px-2 wow zoomIn my-4" data-wow-delay=".2s">
                
</h6>
          <div class="row g-2 shadow-sm bg-white">
            @foreach($post as $k)
            <div class="col-md-3 order-2 order-md-1">
                                   
            <div class="single-table wow fadeInUp bg-white" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="table-content">
                        <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">

                        <img src="{{asset('uploads/posts/'.$k->image)}}" class="img-fluid w-100 h150" alt="...">
                        </a> <div class="card-body">
                            <a href="{{url('article/'.$k->category->slug.'/'.$k->slug)}}" class="w-100 text-dark">
    
                            <h6 class="mb-0">{{$k->name}}</h6>
                            </a>   
                            <small class="card-text text-muted">By {{$k->user->name}} </small>

                            </div>
                        </div>
                    </div>

                </div>
                </div>
    </div>
@endforeach
                   

            </div>
            
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2445563419404346"
     crossorigin="anonymous"></script>
<!-- vert ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2445563419404346"
     data-ad-slot="9378570062"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
        </div>
    </section>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/count-up.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
            $(document).ready(function(){
             $('#search').on('keyup',function(){
                 var query= $(this).val();
                 $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':query},
                    success:function(post){
                        $('#search_list').html(post);
                    }
             });
             //end of ajax call
            });
            });
        </script>

    <script type="text/javascript">

        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
        
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1.5,
            nav:true
        },
        600:{
            items:3,
            nav:true,
            loop:true,
            autoplay:true,
            dots: true
        },
        1000:{
            items:3.8,
            nav:true,
            loop:true,
            autoplay:true,
            dots: true
        }
    }
});
    </script>
<script>
myID = document.getElementById("myID");

var myScrollFunc = function () {
    var y = window.scrollY;
    if (y >= 1900) {
        myID.className = "alsoread show"
    } else {
        myID.className = "alsoread hide"
    }
};

window.addEventListener("scroll", myScrollFunc);
</script>

<script>
   $(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
});
 </script> 
 
<script>
  var burgerBtn = document.getElementById('burgerBtn');
var mobile = document.getElementById('mobile');
var demo1 = document.getElementById('demo1');
var demo2 = document.getElementById('demo2');
var demo3 = document.getElementById('demo3');

burgerBtn.addEventListener('click', function() {
  mobile.classList.toggle('navigation');
}, false);

demo1.addEventListener('click', function() {
  demo1.classList.add('active');
  demo2.classList.remove('active');
  demo3.classList.remove('active');
  mobile.classList.add('demo1');
  mobile.classList.remove('demo2', 'demo3', 'navigation');
}, false);

demo2.addEventListener('click', function() {
  demo2.classList.add('active');
  demo1.classList.remove('active');
  demo3.classList.remove('active');
  mobile.classList.add('demo2');
  mobile.classList.remove('demo1', 'demo3', 'navigation');
}, false);

demo3.addEventListener('click', function() {
  demo3.classList.add('active');
  demo1.classList.remove('active');
  demo2.classList.remove('active');
  mobile.classList.add('demo3');
  mobile.classList.remove('demo1', 'demo2', 'navigation');
}, false);
</script>
@endsection