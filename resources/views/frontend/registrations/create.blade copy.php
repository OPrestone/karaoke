@extends('layouts.dash-auth')


@section('title', "Register to {{$event->name}}")
@section('meta_description', "Register to {{$event->name}}")
@section('meta_keyword', "Register {{$event->name}}")
@section('content')
<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-10 col-lg-10 mx-auto d-table h-100 shadow">
					<div class="d-table-cell align-middle">

						<div class="text-center my-4">
							<h1 class=" text-white">Get started</h1>
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
            <form action="{{url('event/'.$event->id.'/register')}}" method="POST" enctype="multipart/form-data">
                @csrf
    <div  class="card w-100">
        <div  class="card-header">
        <h4  class="">Register For {{$event->name}}</h4>

        </div>
<div  class="row">
    <div  class="col-md-5">

        <div  class="card-body">
            <div class="row">
                <div class="col-6 mb-3">
                <label for="">Select Your Song</label>
                        <select class="form-control select2" name="song_id"  id="song_id" data-toggle="select2">
                <optgroup label="All Songs">
                @php
                $songs = App\Models\Song::all();

                @endphp
                @foreach ($songs as $c)

                <option value="{{$c->id}}">{{$c->name}}{{$c->track_name}}</option>
                @endforeach
                </optgroup>
                </select>

                                        @error('song_id')
                                            <span  class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">




            <button type="submit"  class="btn btn-primary w-100 mt-4">Save event</button>
        </div>
</div></div>
            </form>

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
@endsection
