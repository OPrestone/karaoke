
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
                                                <img src="{{asset('uploads/events/'.$event->image)}}" class="ratio11 w-100" style="object-fit: cover;" alt="">
                                            </div>
                                            <div class="col-8">
                                             <p class="mb-1"><b>Location:</b> {{$event->location}} </p>
                                             <p class="mb-1"><b>Venue:</b> {{$event->venue}} </p>
                                             <p class="mb-1"><b>Prize:</b> {{$event->prize}} </p>
                                             <p class="mb-1"><b>Scheduled On:</b> {{$event->date}} at {{$event->start_time}} to {{$event->end_time}} </p>
                                             <p class="mb-1"><b>Host:</b> {{$event->host}} </p>
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
                                <button id="generateQrCodeButton" class="card-title text-center btn w-100 mb-0 btn-success">Generate QR Code</button>

                                </div>
								<div class="card-body">
                                <div class="row" style="height: 250px">
                                        <div class="col-12 align-self-center text-center" id="qrcode" class="w-100">
                                            <style>
                                               #qrcode img{
    display: block;
    margin: auto;
}
                                            </style>

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
 								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead>
											<tr>
        <tr>
            <th>
                #
            </th>
            <th>
                IMG
            </th>
            <th>UserName</th>
            <th>Location</th>
            <th>Phone Number</th>
            <th>Song</th>
            <th>Joined On</th>
            <th>
                Role
            </th>
        </tr>
											</tr>
										</thead>
										<tbody>
                                        @foreach ($registered as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
        <td>
            <img src="{{asset('uploads/users/'.$item->image)}}" width="50px" height="50px" style="object-fit: cover;" alt="">
        </td>
        <td>{{$item->first_name}} {{$item->last_name}}</td>
        <td>{{$item->location}}</td>
        <td>{{$item->phone}}</td>
        <td>
        @foreach ($registration->where('user_id', $item->id)->where('event_id', $event->id) as $userRegistration)
                @php
                    $song = App\Models\Song::find($userRegistration->song_id);
                @endphp
                @if ($song)
                    <p>{{ $song->name }}</p>
                @endif
            @endforeach

        </td>
        <td>{{$item->created_at}}</td>

        <td>
            <div class="d-flex">
                <a href="{{url('admin/screen/'.$item->id.'/'.$item->first_name)}}" class="btn btn-success shadow btn-xs sharp mr-1">
                    <i class="fa fa-eye"></i>
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
                                <a type="button" class="btn btn-primary" href="{{url('admin/delete-reg/'.$userRegistration->id)}}">Delete</a>
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

                    <style>
    #sortableTable {
        width: 100%;
        border-collapse: collapse;
    }

    #sortableTable td {
        padding: 10px;
        border: 1px solid #ccc;
        cursor: grab;
    }
</style>

                    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

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
                    <script>
                        document.getElementById('generateQrCodeButton').addEventListener('click', function() {
                            // Get the current URL
                            var currentURL = window.location.href;

                            // Create a QR code with the current URL
                            var qrcode = new QRCode(document.getElementById('qrcode'), {
                                text: currentURL,
                                width: 256,
                                height: 256
                            });
                        });
                    </script>
<script>
    const sortableTable = new Sortable(document.getElementById('datatables-buttons').getElementsByTagName('tbody')[0], {
        animation: 150, // Set the animation duration in milliseconds
        onUpdate: function (evt) {
            // This function will be called when the order of the items is updated
            // You can perform any actions needed here, like updating the server or saving the new order
        },

    } );
</script>

				</div>
			</main>

            @endsection
