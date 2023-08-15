@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main  class="content">
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between mb-3"> 
    <h1 class="h3 mb-3">New Event</h1>
    <button type="submit" class="btn btn-lg btn-dark py-1 px-4">Add Event</button>
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
            <form action="{{url('admin/add-event')}}" method="POST" enctype="multipart/form-data">
                @csrf  
    <div  class="card w-100">
        <div  class="card-header">
        <h4  class="">Add event</h4>

        </div>
<div  class="row">
    <div  class="col-md-9">
        
        <div  class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="">Event Name</label>
                    <input type="text" name="name"  id="name" class="auto-save form-control">
                                        @error('name')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-6 mb-3"> 
                <label for="">Host</label>
                    <input type="text" name="host"  id="host" class="auto-save form-control">
                                        @error('host')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div> 


            <div class="row">
                <div class="col-6 mb-3">
                <label for="">Main Artist</label>
                    <input type="text" name="main_artist"  id="main_artist" class="auto-save form-control">
                                        @error('main_artist')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-6 mb-3">
                <label for="">Artists</label>
                    <input type="text" name="artists[]" id="artists" data-role="tagsinput"  id="artists" class="form-control auto-save w-100">
                    @error('artists')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div> 
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="">Event Prize</label>
                    <input type="text" name="prize"  id="prize" class="auto-save form-control">
                                        @error('prize')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-4 mb-3">
                    <label for="">Event Sponsor</label>
                    <input type="text" name="sponsor"  id="sponsor" class="auto-save form-control">
                                        @error('sponsor')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-4 mb-3">
                <label for="">Location</label> 
         <select class="form-control select2" name="location"  id="location" data-toggle="select2">
<optgroup label="Kenya Counties">
@foreach ($county as $c)

<option value="{{$c->id}}">{{$c->name}}</option>
@endforeach
</optgroup>    
</select> 
  
                                        @error('location')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div> 
            <div class="row">
                <div class="col-4 mb-3">
                <label for="">Date</label>
                    <input type="date" name="date"  id="date" class="auto-save form-control">
                                        @error('date')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
                <div class="col-4 mb-3">
                    <label for="">Start Time</label>
                    <input type="time" name="start_time"  id="start_time" class="auto-save form-control">
                                        @error('start_time')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                <div class="col-4 mb-3">
                    <label for="">End Time</label>
                    <input type="time" name="end_time"  id="end_time" class="auto-save form-control">
                                        @error('end_time')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
            </div> 
            
         
                    <div  class="mb-3">
                    <label for="">venue</label>
                    <input type="text" name="venue"  id="venue" class="auto-save form-control">
                                        @error('venue')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div> 
                    <div  class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="your_summernote" cols="30" rows="10"  id="description" class="auto-save form-control"></textarea>
                                        @error('description')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
                                <div  class="basic-form">
                                        <div  class="form-group">
                                            <div  class="form-check form-check-inline">
                                                <label  class="form-check-label">
                                                    <input type="checkbox"  id="pre_reg" class="form-check-input" name="pre_reg"> Allow Pre Registration
                                                </label>
                                            </div>
                                            <div  class="form-check form-check-inline">
                                                <label  class="form-check-label">
                                                    <input type="checkbox"  id="external" class="form-check-input" name="external"> Allow External Voting
                                                </label>
                                            </div>
                                            <div  class="form-check form-check-inline align-self-center">
                                                <label  class="form-check-label">
                                                    <input type="checkbox"  id="group" class="form-check-input" name="group"> Allow Group Singing
                                                </label>
                                            </div>
                                        </div>
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
								<input type="file" class="file-upload" hidden accept="image/*" onchange="handleFileUpload(event)"  name="image" />
								<small class="text-center">Upload Cover Art</small> 
                            
            <button type="submit"  class="btn btn-primary w-100 mt-4">Save event</button>
        </div> 
</div></div> 
            </form>


 
</div>
    </div>
</main>
 

					<script>
						document.addEventListener("DOMContentLoaded", function(event) {
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
