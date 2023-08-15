@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main  class="content">
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between mb-3"> 
    <h1 class="h3 mb-3">New song</h1>
    <button type="submit" class="btn btn-lg btn-dark py-1 px-4">Add song</button>
    </div>
    </div>
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
            <form action="{{url('admin/create-song')}}" method="POST" enctype="multipart/form-data">
                @csrf  
    <div  class="card w-100">
        <div  class="card-header">
        <h4  class="">Add song</h4>       
        </div>
<div  class="row">
    <div  class="col-md-9">
        
        <div  class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="">song Name</label>
                    <input type="text" name="track_name"  id="track_name" class="auto-save form-control">
                                        @error('track_name')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-6 mb-3">
                    <label for="">song album</label>
                    <input type="text" name="album"  id="album" class="auto-save form-control">
                                        @error('album')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-6 mb-3"> 
                <label for="">preview_url</label>
                    <input type="text" name="preview_url"  id="preview_url" class="auto-save form-control">
                                        @error('preview_url')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div>  
            <div class="row">
                <div class="col-6 mb-3">
                <label for="">Youtube_id</label>
                    <input type="text" name="youtube_id"  id="youtube_id" class="auto-save form-control">
                                        @error('youtube_id')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-6 mb-3">
                <label for="">Artist</label>
                    <input type="text" name="artist" id="artist" data-role="tagsinput"  id="artist" class="form-control auto-save w-100">
                    @error('artist')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div>  
            
         
            <!-- <div  class="mb-3">
                    <label for="">lyrics</label>
                    <input type="text" name="lyrics"  id="lyrics" class="auto-save form-control">
                                        @error('lyrics') 
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>    -->
                    <div  class="mb-3">
                    <label for="">track_id</label>
                    <input type="text" name="track_id"  id="track_id" class="auto-save form-control">
                                        @error('track_id') 
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>   
                   
    </div>
    </div> 
    <div  class="col-md-3 pt-3">
    <div  class="p-0"> 
                            <div  class="card-body ps-0 text-center">
                     
									<div class="roundedimage" onclick="openFileUpload()" style="background-color:grey">
										<div class=""><i class="fa fa-image image-icon" style="font-size: 25px; color:white"></i></div>
									</div>
								<!-- File Upload Input -->
								<input type="file" class="file-upload" hidden accept="image/*" onchange="handleFileUpload(song)"  name="image_url" />
								<small class="text-center">Upload Cover Art</small> 
                            
            <button type="submit"  class="btn btn-primary w-100 mt-4">Save song</button>
        </div> 
</div></div> 
            </form>


 
</div>
    </div>
</main>
 

					<script>
						document.addsongListener("DOMContentLoaded", function(song) {
							// Select2
							$('.select2').each(function() {
								$(this)
									.wrap('<div class="position-relative"></div>')
									.select2({
										placeholder: 'Select value',
										dropdownParent: $(this).parent()
									});
							})
							// Daterangepicker
							$('input[name="daterange"]').daterangepicker({
								opens: 'left'
							});
							$('input[name="datetimes"]').daterangepicker({
								timePicker: true,
								opens: 'left',
								startDate: moment().startOf('hour'),
								endDate: moment().startOf('hour').add(32, 'hour'),
								locale: {
									format: 'M/DD hh:mm A'
								}
							});
							$('input[name="datesingle"]').daterangepicker({
								singleDatePicker: true,
								showDropdowns: true
							});
							var start = moment().subtract(29, 'days');
							var end = moment();

							function cb(start, end) {
								$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
							}
							$('#reportrange').daterangepicker({
								startDate: start,
								endDate: end,
								ranges: {
									'Today': [moment(), moment()],
									'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
									'Last 7 Days': [moment().subtract(6, 'days'), moment()],
									'Last 30 Days': [moment().subtract(29, 'days'), moment()],
									'This Month': [moment().startOf('month'), moment().endOf('month')],
									'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
								}
							}, cb);
							cb(start, end);
						});
					</script>
 
 
<script type="text/javascript">

//$('.auto-save').savy('load') --> can be used without callback
$('.auto-save').savy('load',function(){
  console.log("All data from savy are loaded");
});

function dstry(){
  //$('.auto-save').savy('destroy') --> can be used without callback
  $('.auto-save').savy('destroy',function(){
    console.log("All data from savy are Destroyed");
    window.location.reload();
  });
}
</script>   
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
      aspect-ratio: 1/1.4; 
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
    function handleFileUpload(song) {
      var file = song.target.files[0];
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
