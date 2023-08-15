
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')

			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3">
					<h1 class="h3 mb-3">  {{$event->name}} </h1>
                    <a href="{{url('admin/event/'.$event->id)}}" class="btn btn-lg btn-dark px-4">
                    <i class="fa fa-rocket"></i> Launch event
                </a>
					</div>

					<div class="row mb-4">
                        <div class="col-8">
                        <div class="shadow pt-2 bg-white p-3">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{asset('uploads/events/'.$event->image)}}" class="ratio12 w-100" style="object-fit: cover;" alt="">
                                            </div>
                                            <div class="col-8">
                                             <p class="mb-2"><b>Location:</b> {{$event->location}} </p>
                                             <p class="mb-2"><b>Venue:</b> {{$event->venue}} </p>
                                             <p class="mb-2"><b>Prize:</b> {{$event->prize}} </p>
                                             <p class="mb-2"><b>Scheduled On:</b> {{$event->date}} at {{$event->start_time}} to {{$event->end_time}} </p>
                                             <p class="mb-2"><b>Host:</b> {{$event->host}} </p>
                                            <div class="mt-3">
                                                <h4><b>Description</b></h4>
                                            <p class="mb-0">{{$event->description}} </p>
                                            </div>
                                            </div>
                                        </div>

                                </div>
                        </div>
						<div class="col-4">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title text-center mb-0">Generate QR Code</h4>
                                </div>
								<div class="card-body">
                                <div class="row" style="height: 250px">
                                        <div class="col-12 align-self-center text-center">
                                        <a href="{{url('admin/profile/'.$event->id.'/'.$event->first_name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                                           Generate Code
                                        </a>
                                        </div>
                                </div>
								</div>
							</div>
						</div>

						</div>



                        <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
                                <h4 class="card-title">Scheduled Participants</h4>
									<h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table.</h6>
								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead>
											<tr>
        <tr>
            <th>
                ID
            </th>
            <th>
                IMG
            </th>
            <th>UserName</th>
            <th>Location</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Joined On</th>
            <th>
                Role
            </th>
            <th>Action</th>
        </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>
				<img src="{{asset('uploads/users/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt="">
		</td>
            <td>{{$item->first_name}} {{$item->last_name}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>

            <td>{{$item->created_at}}</td>

            <td>{{$item->role_as== '1' ? 'Admin':'User'}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('admin/profile/'.$item->id.'/'.$item->first_name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1">
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
                                <a type="button" class="btn btn-primary" href="{{url('admin/delete-user/'.$item->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>


        </tr>
        @endforeach
										</tfoot>
									</table>
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

