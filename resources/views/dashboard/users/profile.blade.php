
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
					<h1 class="h3 mb-3"> User Profile</h1>
                    <a href="{{url('admin/user/'.$user->id)}}" class="btn btn-lg btn-dark px-4">
                    <i class="fa fa-pen"></i> Edit User
                </a> 
					</div>

					<div class="row">
                        <div class="col-8">
                        <div class="shadow pt-2 bg-white p-3"> 
                                        <div class="row">
                                            <div class="col-4"> 
                                                <img src="{{asset('uploads/users/'.$user->image)}}" class="ratio11 w-100" style="object-fit: cover;" alt="">  
                                            </div>
                                            <div class="col-8">
                                           <h1> {{$user->first_name}} {{$user->last_name}} </h1>
                                             <p class="mb-2"><b>Location:</b> {{$user->location}} </p>
                                             <p class="mb-2"><b>phone:</b> {{$user->phone}} </p>
                                             <p class="mb-2"><b>Age:</b> {{$user->dob}} </p>
                                             <p class="mb-2"><b>Joined On:</b> {{$user->created_at}} </p>
                                             <p class="mb-2"><b>Ranking:</b> {{$user->id}} </p>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <h4><b>Bio</b></h4>
                                            <p class="mb-0">{{$user->description}} </p>
                                            </div>
                                        </div> 
                                        
                                </div> 
                        </div>
						<div class="col-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Wall Of Fame</h5>
                                </div>
								<div class="card-body">

                                 @foreach ($users as $item)
                                <div class="shadow row pt-2">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4"> 
                                                <img src="{{asset('uploads/users/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt="">  
                                            </div>
                                            <div class="col-8">
                                           <h5> {{$item->first_name}} {{$item->first_name}} </h5>
                                             <p>{{$item->location}} </p>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-3">
                                        <a href="{{url('admin/profile/'.$item->id.'/'.$item->first_name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        </div>
                                </div> 
                                 @endforeach
								</div>
							</div>
						</div>
 
					</div>

					<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								buttons: ["copy", "print"],
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>

				</div>
			</main>

            @endsection