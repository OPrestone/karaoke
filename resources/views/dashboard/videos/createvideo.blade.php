

@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main class="content">
    <div class="container-fluid p-0">
        <div class="card-body"> 
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{url('admin/add-video')}}" method="POST" enctype="multipart/form-data">
                @csrf 
<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4> 
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Video</a></li>
                        </ol>
                    </div>
                </div>
<div class="row">
    <div class="col-md-9">
        
    <div class="card w-100">
        <div class="card-header">
        <h4 class="">Add Video</h4>

        </div>
        <div class="card-body">
                <div class="mb-3">
                    <select name="category_id" class="form-control" id="">
                        @foreach ($category as $cateitem)

                        <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                <label for="">Headline</label>
                <input type="text" name="name" class="form-control">
            </div>
                <div class="mb-3">
                <label for="">slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
                <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" id="your_summernote" cols="30" rows="10" class="form-control"></textarea>
            </div>
                <div class="mb-3">
                <label for="">Enter Video Embed Code</label>
                <input name="yt_iframe" id="" type="text" placeholder="enter youtube url" class="form-control">
            </div>
               
            <h6>
                SEO Tags
            </h6>
                <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
                <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
                <div class="mb-3">
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keyword" class="form-control">
            </div>

    </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card">
                            <div class="card-header">
                                <h6>Status Mode</h6>        
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="breaking"> Breaking
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline align-self-center">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="status"> Hide Video
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              
                                <div>
                                
									<div class="roundedimage" onclick="openFileUpload()" style="background-color:grey">
										<div class=""><i class="fa fa-image image-icon" style="font-size: 25px; color:white"></i></div>
									</div>
								<!-- File Upload Input -->
								<input type="file" class="file-upload" hidden accept="image/*" onchange="handleFileUpload(event)"  name="image" />
								<small class="text-center">Upload Cover Art</small> 
                            
                                </div>
                            </div>
        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-dark">Save Video</button>
        </div>
                        </div>
</div>
            </form>

 
        </div>
    </div>
</main>

 
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
