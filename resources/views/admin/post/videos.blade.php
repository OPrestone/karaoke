
@extends('layouts.master')

@section('title', 'All Posts')
@section('content')


<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span>Datatable</span>
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
                <a href="{{url('admin/add-video')}}" class="btn float-end btn-primary">Add video</a>
                        
                      
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
                                            <th>video Name</th>
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
                                            @foreach ($videos as $item)
                                                <tr>
                                                    <td><b>{{$item->id}}</b></td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->category->name}}</td>
                                                    <td>
                                                        <img src="{{asset('uploads/videos/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt="">
                                                    </td>
                                                    <td>{{$item->status== '1' ? 'hidden':'shown'}}</td>
                                                    <td>{{$item->breaking== '1' ? 'breaking':'no'}}</td>
                                                    <td>
                                                    <div class="d-flex">
                                                        
														<a href="{{url('video/'.$item->category->slug.'/'.$item->slug)}}" class="btn {{$item->status== '1' ? 'd-none':''}} btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
														<a href="{{url('admin/video/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pen"></i></a>
														<a href="{{url('admin/delete-video/'.$item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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