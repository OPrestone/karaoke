@extends('layouts.dash-auth')

@section('title', "Register to Viral News Ke")
@section('meta_description', "Register to Viral News Ke")
@section('meta_keyword', "Register Viral News Ke")
@section('content')
<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-10 col-lg-10 mx-auto d-table h-100 shadow">
                <div class="d-table-cell align-middle">

                    <div class="text-center my-4">
                        <h1 class=" text-white">Get started</h1>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="w-100 row mx-0">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name</label>
                                                        <input id="first_name" type="text"
                                                            class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                                            placeholder="first name" name="first_name"
                                                            value="{{ old('first_name') }}" required
                                                            autocomplete="first_name" autofocus>

                                                        @error('first_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name</label>
                                                        <input id="last_name" type="text"
                                                            class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                                            placeholder="last name" name="last_name"
                                                            value="{{ old('last_name') }}" required
                                                            autocomplete="last_name" autofocus>

                                                        @error('last_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-100 row mx-0">
                                                    <div class="form-group col-md-6">
                                                        <label>Phone Number</label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="phone" placeholder="Enter your Phone" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Location</label>
                                                        <select class="form-control select2" name="location"
                                                            id="location" data-toggle="select2">
                                                            <optgroup label="Kenya Counties">
                                                                @php
                                                                    $locations = App\Models\Location::all();
                                                                @endphp
                                                                @foreach ($locations as $c)
                                                                    <option value="{{ $c->name }}">{{ $c->name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error('location')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-100 row mx-0">
                                                    <div class="form-group col-md-6">
                                                        <label>Date of Birth</label>
                                                        <input class="form-control form-control-lg" type="date"
                                                            name="dob" id="dob" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input id="email" type="email"
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                            placeholder="Your Email" name="email"
                                                            value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-100 row mx-0">
                                                    <div class="form-group col-md-6">
                                                        <label>Password</label>
                                                        <input id="password" type="password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                            placeholder="Password" name="password" required
                                                            autocomplete="new-password">
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group col-md-6">
                                                        <label>Confirm Password</label>
                                                        <input id="password-confirm" type="password"
                                                            class="form-control form-control-lg"
                                                            name="password_confirmation"
                                                            placeholder="Re-enter Password" required
                                                            autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <div class="rounded-image" onclick="openFileUpload()"
                                                style="background-color:grey">
                                                <div class=""><i class="fa fa-image image-icon"
                                                        style="font-size: 25px; color:white"></i></div>
                                            </div>
                                            <!-- File Upload Input -->
                                            <input type="file" class="file-upload" hidden accept="image/*"
                                                onchange="handleFileUpload(event)" name="image" id="image" />
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-center">Upload Profile Picture</small>
                                        </div>
                                    </div>
                                    <div class="checks col-9">
                                        <div class="form-check my-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                By clicking "Sign Up / Login", you acknowledge that you have read, understood, and agree to
                                                Afrobeat Karaoke’s Terms & Conditions.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Allow Notifications and alerts
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <div class="text-center fs-6 mt-4">
                                            @if (Route::has('password.request'))
                                                <b>Already have an account? <a href="{{ url('/login') }}">Login</a></b>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-dark py-1 px-4">Sign up</button>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                                    </div>
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

    body {
        background-image: url(https://img.freepik.com/free-photo/young-african-american-jazz-musician-singing-song-gradient-purple-blue_155003-27501.jpg?w=1800&t=st=1687859460~exp=1687860060~hmac=ddc251a49f752bfd04560a4ff4cc1329ab79cfcdb0a860d90c6d44b834c00b96);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<script>
    // Function to validate the date of birth
    function validateDOB() {
        const dobInput = document.getElementById("dob").value;
        const dob = new Date(dobInput);
        const today = new Date();
        const eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

        if (dob >= eighteenYearsAgo) {
            alert("You must be 18 years or older to proceed.");
            return false;
        }

        return true;
    }

    // Attach the validation function to the form submission
    document.querySelector("form").addEventListener("submit", function(event) {
        if (!validateDOB()) {
            event.preventDefault();
        }
    });

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
