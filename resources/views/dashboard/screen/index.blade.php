
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content')  
			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mb-3"> 
					<h1 class="h3 mb-3">All Events</h1>
                    <button type="submit" class="btn btn-lg btn-dark py-1 px-4">Add Event</button>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Default</h5>
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
            <th>Event Name</th>
            <th>Location</th>
            <th>Venue</th>
            <th>Host</th>
            <th>Date On</th>
            <th>
                Prize
            </th>
            <th>Action</th> 
        </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($events as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>            
				<img src="{{asset('uploads/events/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt=""> 
		</td>
            <td>{{$item->name}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->venue}}</td>
            <td>{{$item->host}}</td>
        
            <td>{{$item->date}}</td>
        
            <td>{{$item->prize}}</td>
        <td>
            <div class="d-flex">
                <a href="{{url('admin/profile/'.$item->id.'/'.$item->first_name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('admin/event/'.$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1">
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
                                <a type="button" class="btn btn-primary" href="{{url('admin/delete-event/'.$item->id)}}">Delete</a>
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