@extends('layouts.dash')

@section('title', 'Edit User')
@section('content')
 
<main class="content">
    <div class="container-fluid p-0">
        <div class="card-body">
        <h1 class="mt-4">Edit User</h1> 
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ url('admin/update-user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="w-100 row mx-0">
                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input id="first_name" value="{{ $user->first_name }}" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="First name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input id="last_name" value="{{ $user->last_name }}" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
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
                                    <input class="form-control form-control-lg" type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter your Phone" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input id="location" value="{{ $user->location }}" type="text" class="form-control form-control-lg @error('location') is-invalid @enderror" placeholder="Your location" name="location" value="{{ old('location') }}" required autocomplete="location">
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
                                    <input class="form-control form-control-lg" value="{{ $user->dob }}" type="date" name="dob" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input id="email" value="{{ $user->email }}" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="password" type="password" value="{{ $user->password }}" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                            <label for="">Role As</label>
                            <select name="role_as" id="role_as" class="form-control form-control-lg @error('role_as') is-invalid @enderror">
                                <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                            </select>
                        </div>
                            </div>
                        </div>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $user->description }}</textarea>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="rounded-image" onclick="openFileUpload()" style="background-color: grey; background-image: url({{ asset('uploads/users/'.$user->image) }})">
                            <div class=""><i class="fa fa-image image-icon" style="font-size: 25px; color:white"></i></div>
                        </div>
                        <!-- File Upload Input -->
                        <input type="file" class="file-upload" hidden accept="image/*" onchange="handleFileUpload(event)" name="image" />
                        <small class="text-center">Upload Profile Picture</small>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-lg btn-dark py-1 px-4">Update User</button>
                </div>
            </form>
        </div>
    </div>
</main>


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
