
@extends('layouts.dash-auth')


@section('title', "Register to e")
@section('meta_description', "Register to e")
@section('meta_keyword', "Register e")
@section('content') 
<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-5 col-lg-5 mx-auto d-table h-100 shadow">
					<div class="d-table-cell align-middle">

						<div class="text-center my-4">
							<h1 class=" text-white">Login</h1>
							<!-- <p class="lead">
								Start creating the best possible user experience for you customers.
							</p> -->
						</div>
                        
@if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                @endif

						<div class="card shadow">
							<div class="card-body">
								<div class="m-sm-4">
									
    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf  
									<div class="form-group">   
											<label>Email</label>          
                                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
 
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
 									</div>  
									 <div class="form-group">   
											<label>Password</label>
                                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
									</div>    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  

										<div class="d-flex justify-content-between mt-3">
                                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> 
							<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										</div> 
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
											<button type="submit" class="btn btn-lg btn-dark py-1 px-4 mt-3 w-100">Sign In</button>
    </div> 

    
                                
    </form>
    <div class="text-center fs-6"> @if (Route::has('password.request'))
                                    <a class="  px-0" href="{{('') }}">
                                      {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif   or <a href="{{url('/register')}}">Sign up</a> 
                            </div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
  <style> 
    
    /* CSS for file upload input */
    .file-upload {
      margin-top: 10px;
    }

    /* CSS for rounded image */
    .rounded-image {
      width: 100%;
      aspect-ratio: 1/1;
      border-radius: 50%;
      background-size: cover;
      background-position: center;
      cursor: pointer;
      position: relative;
    }

    /* CSS for image icon */
    .image-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      background-image: url('image-icon.png'); /* Replace with your desired image icon */
      background-size: cover;
      z-index: 1;
    }
	.btn-dark {
    color: #fff;
    background-color: #000000;
    border-color: #191919;
}
.overlay {
    background-color: #0D002981!important;
}
body{
    background-image: url(https://img.freepik.com/free-photo/young-african-american-jazz-musician-singing-song-gradient-purple-blue_155003-27501.jpg?w=1800&t=st=1687859460~exp=1687860060~hmac=ddc251a49f752bfd04560a4ff4cc1329ab79cfcdb0a860d90c6d44b834c00b96);
    background-size: cover;
    background-position: center; 
	background-repeat: no-repeat;
}
  </style>
 <script>
    function handleFileUpload(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      
      reader.onload = function(e) {
        var roundedImage = document.querySelector('.rounded-image');
        roundedImage.style.backgroundImage = 'url(' + e.target.result + ')';
      }
      
      reader.readAsDataURL(file);
    }
    
    function openFileUpload() {
      var fileUpload = document.querySelector('.file-upload');
      fileUpload.click();
    }
  </script>
@endsection
