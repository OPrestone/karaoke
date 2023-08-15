
@extends('layouts.dash')
@section('title', " meta_title")
@section('meta_description', " meta_description")
@section('meta_keyword', " meta_keyword")

@section('content') 
<main class="content"> 
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-md-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="row">
										<div class="col-8">
											<h3 class="mb-2">{{$users}}</h3>
											<div class="mb-0">Total Users</div>
										</div>
										<div class="col-4 ml-auto text-right">
											<div class="d-inline-block mt-2">
												<i class="feather-lg text-primary" data-feather="user"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="row">
										<div class="col-8">
											<h3 class="mb-2">{{$songs}}</h3>
											<div class="mb-0">Total songs</div>
										</div>
										<div class="col-4 ml-auto text-right">
											<div class="d-inline-block mt-2">
												<i class="feather-lg text-warning" data-feather="mic"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="row">
										<div class="col-8">
											<h3 class="mb-2">{{$events}}</h3>
											<div class="mb-0">Total events</div>
										</div>
										<div class="col-4 ml-auto text-right">
											<div class="d-inline-block mt-2">
												<i class="feather-lg text-danger" data-feather="airplay"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="row">
										<div class="col-8">
											<h3 class="mb-2">{{$users}}</h3>
											<div class="mb-0">Total Videos</div>
										</div>
										<div class="col-4 ml-auto text-right">
											<div class="d-inline-block mt-2">
												<i class="feather-lg text-success" data-feather="video"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xl d-none d-xxl-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="row">
										<div class="col-8">
											<h3 class="mb-2">$ 49.400</h3>
											<div class="mb-0">Total Revenue</div>
										</div>
										<div class="col-4 ml-auto text-right">
											<div class="d-inline-block mt-2">
												<i class="feather-lg text-info" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
 
 
					<div class="row">
						<div class="col-12 col-lg-6 col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Recent Users</h5>
								</div>
								<table id="datatables-dashboard-products" class="table table-striped my-0">
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
        </tr>
											</tr>
										</thead>
										<tbody>
        @foreach ($allusers as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>            
				<img src="{{asset('uploads/users/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt=""> 
		</td>
            <td>{{$item->first_name}} {{$item->last_name}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>  

        </tr>
        @endforeach
										</tfoot>
								</table>
							</div>

							<script>
								document.addEventListener("DOMContentLoaded", function(event) {
									$('#datatables-dashboard-products').DataTable({
										pageLength: 6,
										lengthChange: false,
										bFilter: false,
										autoWidth: false
									});
								});
							</script>
						</div>
						<div class="col-12 col-lg-6 col-xl-4 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Daily feed</h5>
								</div>
								<div class="card-body">
									<div class="media">
										<img src="{{asset('assets/docs')}}/img/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Kathy Davis">
										<div class="media-body">
											<small class="float-right text-navy">15m ago</small>
											<strong>Kathy Davis</strong> started following <strong>Marie Salter</strong><br />
											<small class="text-muted">Today 6:41 pm</small><br />

										</div>
									</div>

									<hr />
									<div class="media">
										<img src="{{asset('assets/docs')}}/img/avatar.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Andrew Jones">
										<div class="media-body">
											<small class="float-right text-navy">1h ago</small>
											<strong>Andrew Jones</strong> posted something on <strong>Marie Salter</strong>'s timeline<br />
											<small class="text-muted">Today 5:41 pm</small>

											<div class="border text-sm text-muted p-2 mt-1">
												Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem...
											</div>
										</div>
									</div>

									<hr />
									<div class="media">
										<img src="{{asset('assets/docs')}}/img/avatar-4.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Marie Salter">
										<div class="media-body">
											<small class="float-right text-navy">3h ago</small>
											<strong>Marie Salter</strong> posted a new blog<br />

											<small class="text-muted">Today 3:35 pm</small>
										</div>
									</div>

									<hr />
									<a href="#" class="btn btn-primary btn-block">Load more</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

            @endsection