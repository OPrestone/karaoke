<footer class="footer">
<section class="bg-white shadow mb-2">
<div class="container">
<div class="py-2 py-md-5 mt-3 row">
<ul class="social d-flex justify-content-between">
                                <li class="pr-5">
                                    <a href="javascript:void(0)">
                                    <img src="{{asset('assets/images/darklogo.png')}}" alt="#">
                                </a>
                               </li>
                                <li><a class="d-flex" href="https://www.facebook.com/ViralKeNews?mibextid=ZbWKwL"><i class="fab fa-facebook mx-2"></i> FACEBOOK        </a></li>
                                <li><a class="d-flex" href="https://instagram.com/viralkenews"><i class="fab fa-instagram mx-2"></i> INSTAGRAM</a></li>
                                <li><a class="d-flex" href="https://twitter.com/ViralKeNews?t=228BKNrXQf4xG6DHONMUmQ&s=09"><i class="fab fa-twitter mx-2"></i> TWITTER</a></li>
                                <li><a class="d-flex" href="javascript:void(0)"><i class="fab fa-whatsapp mx-2"></i> WHATSAPP</a></li>
                            </ul>
</div>
</div>
</section>
<section class="bg-white shadow mb-2">
<div class="container">
<div class="py-5 row">
<div class="col-md-6">
    <h4 class="mb-3">
    Sign up for our Newsletter

    </h4>
    <p>
    Join our newsletter and get updates in your inbox. We won’t spam you and we respect your privacy.
    </p>
</div>
<div class="col-md-6 pl-4 inpts">
<form action="" class="d-flex"><i class="fa fa-paper-plane  mx-2"></i> 
<input type="text" class=" px-3" placeholder="Please Enter Your Email"> <button class="w-25">Send</button>

</form>
</div>
</div>
</div>
</section>
        <!-- Start Footer Top -->
        <div class="footer-top py-3">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark justify-content-center p-0">
            <div class="text-center" >
            <ul class="navbar-nav w-100">
         
        @php
          $categories = App\Models\Category::where('navbar_status', '0')->where('status','0')->get();
        
          @endphp
          @foreach ($categories as $cateitem)
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('iscategory/'.$cateitem->slug) ? 'active' : ''}}" aria-current="page" href="{{ url('iscategory/'.$cateitem->slug) }}">
                    {{$cateitem->name}}</a>
        </li>
        @endforeach  
            </ul>
          </div>
        </nav>
                <nav class="navbar navbar-expand-lg navbar-dark justify-content-center p-0">
            <div class="text-center mt-3" >
            <p class="text-white">© 2022, Viral News. All rights reserved.
            
            </p>

          </div>
        </nav>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="fa fa-chevron-up text-dark"></i>
    </a>

</body>