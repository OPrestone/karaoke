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
            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
                @csrf 
<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>New category</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                        </ol>
                    </div>
                </div>
<div class="row">
    <div class="col-md-9">
        
    <div class="card w-100">
        <div class="card-header">
        <h4 class="">Add Category</h4>

        </div>
        <div class="card-body">
        <div class="mb-3">
                    <label for="">Category Name</label>
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
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="navbar_status"> Hide From Navbar
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline align-self-center">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="status"> Disable Category
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                <div class="imag bg-light" style="background-image: url();">
                                <img id="output" class="w-100" />
                                <p>
                                    
                <input type="file" name="image" class="form-control" id="file"  onchange="loadFile(event)">
                <input type="file"  accept="image/*"  style="display: none;">
            </p>
                                <p><label for="file" style="    cursor: pointer;
    bottom: 100px;
    position: relative;
    color: black;
    background: white;
    padding: 1px 4px;
    border-radius: 5px;">Upload Featured Image</label></p>
                                <p></p>
                                </div>
                            </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
                        </div>
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
