
@extends('layouts.master')

@section('title', 'Add Video')
@section('content')

@if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/add-video')}}" method="POST" enctype="multipart/form-data">
                @csrf 
<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>New Video</span>
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
                                                    <input type="checkbox" class="form-check-input" name="status"> Hide Post
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              
                                <div>
                                
                <input type="file" name="image" class="form-control" id="file"  onchange="loadFile(event)" hidden><input type="file"  accept="image/*"  style="display: none;">
                <label for="file" style="    cursor: pointer;
    position: relative;
    color: black;
    background: white;
    padding: 1px 4px;
    border-radius: 5px;" class="imag bg-light" style="background-image: url();"><img id="output" class="w-100" />Upload Featured Image</label>
                            
                                </div>
                            </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Video</button>
        </div>
                        </div>
</div>
            </form>



<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

@endsection