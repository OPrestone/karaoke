
@extends('layouts.master')

@section('title', 'Edit Post')
@section('content')

<div class="container-fluid px-4">
 
<div class="row">
    <div class="col-md-9">
    <div class="card">
        <div class="card-header">
<h4 class="">Edit Post</h4>

        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
                @endforeach
            </div>
            @endif
                <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="mb-3">
                    <select name="category_id" class="form-control" required id="">
                        <option value="">-- Select Category --</option>
                        @foreach ($category as $cateitem)

                        <option value="{{$cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected': ''}}>{{$cateitem->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                <label for="">Post Name</label>
                <input type="text" name="name" value="{{$post->name}}" class="form-control">
            </div>
            <!--    <div class="mb-3">-->
            <!--    <label for="">slug</label>-->
            <!--    <input type="text" name="slug" value="{{$post->slug}}" class="form-control">-->
            <!--</div>-->
            <!--    <div class="mb-3">-->
            <!--    <label for="">Youtube Link</label>-->
            <!--    <input hidden type="text" name="yt_iframe" value="{{$post->slug}}" class="form-control">-->
            <!--</div>-->
                <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" id="your_summernote" cols="30" rows="10" class="form-control">{!! $post->description!!}</textarea>
            
            </div>
                
            <h6>
                SEO Tags
            </h6> 
                <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" id="your_summernote" cols="30" rows="10" class="form-control">{!! $post->meta_description !!}</textarea>
            </div>
                <div class="mb-3">
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keyword[]" id="meta_keyword" data-role="tagsinput" class="form-control auto-save w-100" value="{{$post->meta_keyword}}">
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
                                <div class="basic-form row">
                                        <div class="form-group col-12">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"  name="breaking" {{$post->breaking == '1' ? 'checked':''}}> Breaking
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline align-self-center">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"  name="status" {{$post->status == '1' ? 'checked':''}}> Make Draft
                                                </label>
                                            </div>
                                            
                                        </div>
                <div class="mb-3 w-100 col-12">
                <label for="">Scheduled at</label>
                <br>
                <input type="datetime-local" name="scheduled_at" id="scheduled_at" value="{{$post->scheduled_at}}"   class="form-control auto-save w-100">
            </div>
                                </div>
                                
                    <img src="{{asset('uploads/posts/'.$post->image)}}" class="w-100 auto-save mb-2" />
                <input type="file" name="image" class="form-control" id="file"  onchange="loadFile(event)" hidden><input type="file"  accept="image/*"  style="display: none;">
                <label for="file" style="    cursor: pointer;
    position: relative;
    color: black;
    background: white;
    padding: 1px 4px;
    border-radius: 5px;" class="imag bg-light" style="background-image: url();"><img id="output" class="w-100" />Change Featured Image</label>
    
        <input type="text" name="caption" id="caption"  value="{{$post->caption}}" class="form-control mt-3 auto-save">
                            
        <div class="mt-3">
            <button type="submit" class="btn btn-primary px-3 py-0">Save Post</button>
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