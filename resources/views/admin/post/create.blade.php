
@extends('layouts.master')

@section('title', 'Add Post')
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
    <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
        @csrf 
<div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>New Post</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create post</a></li>
                </ol>
            </div>
        </div>
<div class="row">
<div class="col-md-12">

<div class="card w-100">
<div class="card-header">
<h4 class="">Add Post</h4>

</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="row g-2">
        <div class="mb-3 col-9"> 
                <label for="">Headline</label>
                <br>
        <input type="text" name="name" id="name" placeholder="Enter Headline" class="form-control  auto-save">
       
    </div>
        <div class="mb-3 col-md-3">
                <label for="">Category</label>
                <br>
            <select name="category_id" class="form-control auto-save" id="category_id" >
                @foreach ($category as $cateitem)

                <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                @endforeach
            </select>
        </div> 
            </div>
      
    <div class="row"> 
        <div class="col-7">
                <div class="mb-3 w-100">
                <label for="">Meta keyword</label>
                <br>
                <input type="text" name="meta_keyword[]" id="meta_keyword" data-role="tagsinput" class="form-control auto-save w-100">
            </div>
            </div>
            <div class="col-md-6">
                 
            <div class="mb-3"> 
            <textarea name="meta_description"  cols="30" rows="10" class="form-control auto-save" id="meta_description" hidden></textarea>
        </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-0">  
                    <div class="basic-form row mt-2">
                            <div class="form-group col-md-6 pt-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input auto-save" id="breaking" name="breaking"> Breaking
                                    </label>
                                </div>
                                <div class="form-check form-check-inline align-self-center">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="status" name="status"> Make Draft
                                    </label>
                                </div>
                            </div>
                <div class="mb-3 w-100 col-md-6">
                <label for="">Schedule This Post</label>
                <br>
                <input type="datetime-local" name="scheduled_at" id="scheduled_at"  class="form-control auto-save w-100">
            </div>
                    </div
                    <div> 
    <input type="file" name="image" class="form-control auto-save"  value='<?php echo old('image'); ?>'  id="file"  onchange="loadFile(event)" hidden><input type="file"  accept="image/*"  style="display: none;">
    <label for="file" style="    cursor: pointer;
position: relative;
color: black;
background: white;
padding: 1px 4px;
border-radius: 5px;" class="imag bg-light w-100" style="background-image: url();"><img id="output" class="w-100 auto-save" />Upload Featured Image</label>

        <input type="text" name="caption" id="caption" placeholder="Enter caption" class="form-control mt-3 auto-save">
                
                    </div>

            </div> 
    </div>
</div>

<div class="mb-3">
    <label for="">Post Content</label>
 <textarea name="description" id="your_summernote" cols="30" rows="10" class="form-control auto-save summernote"><?php echo old('description'); ?></textarea>
</div>
 
<div class="m-3 row">
    <button type="submit" class="btn float-end btn-primary p-2 rounded-0" style="
    position: fixed;
    right: 0;
    top: 56%;">Save</button>
    <button type="submit" class="btn float-end btn-primary px-3 py-0">Save Post</button>
    </div>
</div>
</div> 
    </form>    
           
    
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/savy.min.js') }}"></script>

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
    @endsection 
     
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
    <script>
        $(.summernote).summernote({
  callbacks: {
    onPaste: function (e) {
      var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
      if(bufferText.match(/(http|https)\:\/\/(?:www\.|\/\/)instagram\.com\/p\/(.[a-zA-Z0-9_-]*)/)) {
        urls = bufferText.match(/(http|https)\:\/\/(?:www\.|\/\/)instagram\.com\/p\/(.[a-zA-Z0-9_-]*)/g);
        urls.forEach(function(element) {
          $.ajax({
            url: "https://api.instagram.com/oembed/?url=" + element,
            success: function( data ) {
              document.execCommand('insertHtml', null, data.html + "<br>");
            }, 
            async: false
          });
        })
      }
    }
  }
});
 $out=preg_replace("~<blockquote(.*?)>(.*)</blockquote>~si","",' '.$str.' ');
    </script>
</html>
