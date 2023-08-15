<!-- create.blade.php -->

@extends('layouts.dash')

@section('content')
    <div class="container">
    @if (session('message'))
                <div  class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif        
@if ($errors->any())
                    <div  class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                @endif 
        <div class="row justify-content-center">
            <div class="col-10">
					<div class="d-flex justify-content-between my-4"> 
					<h1 class="h3 mb-3">New album</h1> 
					</div>
                <div class="card">
                    <div class="card-header">Create Album</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.albums.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-5"> 
									<div class="roundedimage" onclick="openFileUpload()" style="background-color:grey">
										<div class=""><i class="fa fa-image image-icon" style="font-size: 25px; color:white"></i></div>
									</div>
								<!-- File Upload Input -->
								<input type="file" class="file-upload" hidden accept="image/*" onchange="handleFileUpload(event)"  name="image" />
								<small class="text-center">Upload Cover Art</small> 
                                </div>
                                <div class="col-7">

                            <div class="form-group row"> 

                                <div class="col-md-12 mb-2">
                                <label for="name" class="col-form-label text-md-right">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div class="col-6">
                                <label for="date" class="col-form-label text-md-right">Date</label>
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autofocus>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 

                                <div class="col-md-6">
                                <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                    <input id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" value="{{ old('venue') }}" required>

                                    @error('venue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description" class="col-form-label text-md-right">Description</label>
 
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div>
                            <div class="form-group mb-0">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-dark">
                                        Create Album
                                    </button>
                                </div>

                                </div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
    }
    .dz-demo-trigger, .sidebar-right-trigger{
        display: none!important;
    } 
    
    /* CSS for file upload input */
    .file-upload {
      margin-top: 10px;
    }

    /* CSS for rounded image */
    .roundedimage {
      width: 100%;
      aspect-ratio: 1/1; 
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
  </style>
 <script>
    function handleFileUpload(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      
      reader.onload = function(e) {
        var roundedImage = document.querySelector('.roundedimage');
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
