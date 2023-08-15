
@extends('layouts.master')

@section('title', 'All Posts')
@section('content')


<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi 		@if (Route::has('login'))
										@auth   
										
										{{ Auth::user()->name }} 
										
										@endauth
								@endif, welcome back!</h4>
                            <span>Manage Posts</span>
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
                  
					<div class="col-12">
                        <div class="card">    
                            <div class="card-header  w-100">
            <h4>All  Posts</h4>
                <a href="{{url('admin/add-post')}}" class="btn float-end btn-primary">Add Post</a>
                        
                      
                            </div>
                            <div class="card-body">
                                @if (session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="example3" data-order='[[ 0, "desc" ]]' class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                            </th>
                                            <th>Post Name</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                breaking
                                            </th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($posts as $item)
    <tr>
        <td><b>{{$item->id}}</b></td>
        <td>{{$item->name}}</td>
        <td>{{$item->category->name}}</td>
        <td>
            <img src="{{asset('uploads/posts/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt="">
        </td>
        <td>{{$item->status== '1' ? 'hidden':'shown'}}</td>
        <td>{{$item->breaking== '1' ? 'breaking':'no'}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('article/'.$item->category->slug.'/'.$item->slug)}}" class="btn {{$item->status== '1' ? 'd-none':''}} btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('admin/post/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1">
                    <i class="fa fa-pen"></i>
                </a>
                <button type="button" class="btn btn-danger shadow btn-xs sharp mr-1" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Are You Sure You want to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deleting a post is permanent and you cannot undo
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a type="button" class="btn btn-primary" href="{{url('admin/delete-post/'.$item->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </td>
    </tr>
@endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
 

				</div>

</div>

</div>


@endsection