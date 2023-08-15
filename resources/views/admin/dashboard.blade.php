

@extends('layouts.master')

@section('title', 'Admin Dashboard')
@section('content')

				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					<h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
					<div class="weather-btn mb-2">
						<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
						<select class="form-control style-1 default-select  mr-3 ">
						     @foreach ($category as $cateitem)

                        <option >{{$cateitem->name}}</option>
                        @endforeach
						</select>
					</div>
					<a href="{{url('/admin/add-post')}}" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Add Post</a>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<div class="circle">
									<img src="https://img.icons8.com/ios-glyphs/30/ffffff/group.png"/>
								</div>
								<h2 class="text-black mb-2 mt-4 fs-20 font-w600">{{$users}} Users</h2>
								<p class="mb-0 fs-14">
									<svg width="29" height="22" viewbox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g filter="url(#filter0_d1)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
										</g>
										<defs>
										<filter id="filter0_d1" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterunits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feflood flood-opacity="0" result="BackgroundImageFix"></feflood>
										<fecolormatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></fecolormatrix>
										<feoffset dy="1"></feoffset>
										<fegaussianblur stddeviation="2"></fegaussianblur>
										<fecolormatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0"></fecolormatrix>
										<feblend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feblend>
										<feblend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feblend>
										</filter>
										</defs>
									</svg>
									<span class="text-success mr-1">45%</span>This week
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<div class="circle bg-primary">
								<img src="https://img.icons8.com/fluency-systems-regular/30/ffffff/comments--v1.png"/>
								</div>								
								<h2 class="text-black mb-2 fs-20 mt-4  font-w600">{{$comments}} Comments</h2>
								<p class="mb-0 fs-13">
									<svg width="29" height="22" viewbox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g filter="url(#filter0_d2)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
										</g>
										<defs>
										<filter id="filter0_d2" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterunits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feflood flood-opacity="0" result="BackgroundImageFix"></feflood>
										<fecolormatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></fecolormatrix>
										<feoffset dy="1"></feoffset>
										<fegaussianblur stddeviation="2"></fegaussianblur>
										<fecolormatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0"></fecolormatrix>
										<feblend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feblend>
										<feblend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feblend>
										</filter>
										</defs>
									</svg>
									<span class="text-success mr-1">45%</span>This week
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<div class="circle bg-warning">
								<img src="https://img.icons8.com/fluency-systems-regular/30/ffffff/women-s-portal--v1.png"/>								</div>
								<h2 class="text-black mb-2 fs-20 mt-4 font-w600">{{$posts}} Posts</h2>
								<p class="mb-0 fs-14">
									<svg width="29" height="22" viewbox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g filter="url(#filter0_d4)">
										<path d="M5 4C5.91797 5.08433 8.89728 8.27228 10.5 10L16.5 7L23.5 16" stroke="#FF2E2E" stroke-width="2" stroke-linecap="round"></path>
										</g>
										<defs>
										<filter id="filter0_d4" x="-3.05176e-05" y="0" width="28.5001" height="22.0001" filterunits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feflood flood-opacity="0" result="BackgroundImageFix"></feflood>
										<fecolormatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></fecolormatrix>
										<feoffset dy="1"></feoffset>
										<fegaussianblur stddeviation="2"></fegaussianblur>
										<fecolormatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.180392 0 0 0 0 0.180392 0 0 0 0.61 0"></fecolormatrix>
										<feblend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feblend>
										<feblend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feblend>
										</filter>
										</defs>
									</svg>
									<span class="text-danger mr-1">45%</span>This week
								</p>	
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 m-t35">
						<div class="card card-coin">
							<div class="card-body text-center">
								<div class="circle bg-danger">
									<img src="https://img.icons8.com/ios-glyphs/30/ffffff/group.png"/>
								</div>
								<h2 class="text-black fs-20 mb-2 mt-4 font-w600">{{$categories}} Categories</h2>
								<p class="mb-0 fs-14">
									<svg width="29" height="22" viewbox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g filter="url(#filter0_d5)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
										</g>
										<defs>
										<filter id="filter0_d5" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterunits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feflood flood-opacity="0" result="BackgroundImageFix"></feflood>
										<fecolormatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></fecolormatrix>
										<feoffset dy="1"></feoffset>
										<fegaussianblur stddeviation="2"></fegaussianblur>
										<fecolormatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0"></fecolormatrix>
										<feblend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feblend>
										<feblend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feblend>
										</filter>
										</defs>
									</svg>
									<span class="text-success mr-1">45%</span>This week
								</p>	
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9 col-xxl-8">
						<div class="card">
							<div class="card-header border-0 flex-wrap pb-0">
								<div class="mb-3">
									<h4 class="fs-20 text-black">Website Overview</h4>
									<p class="mb-0 fs-12 text-black">Statistics For Viral News Website</p>
								</div>
								<div class="d-flex flex-wrap mb-2">
								 
									
								</div>
							 
							</div>
							<div class="card-body pb-2 px-3">
							 
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
    <div id="linechart" width="100%" height="40"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var population = <?php echo $population; ?>;
        console.log(population);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);
        function lineChart() {
            var data = google.visualization.arrayToDataTable(population);
            var options = {
                title: 'Post Views',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }        
    </script>
							</div>
						</div>
						
              
					</div>
					<div class="col-xl-3 col-xxl-4">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h5 class="fs-16 text-black">Social Media Statistics</h5>
							</div>
							<div class="card-body pb-0">
								<div id="currentChart" class="current-chart"></div>
								<div class="chart-content">	
									<div class="d-flex justify-content-between mb-2 align-items-center">
										<div>
											<svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="15" height="15" rx="7.5" fill="#EB8153"></rect>
											</svg>
											<span class="fs-14">Twitter (66%)</span>
										</div>
										<div>
											<h5 class="mb-0">167,884.21</h5>
										</div>
									</div>
									<div class="d-flex justify-content-between mb-2 align-items-center">
										<div>
											<svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="15" height="15" rx="7.5" fill="#71B945"></rect>
											</svg>

											<span class="fs-14">Facebook (50%)</span>
										</div>
										<div>
											<h5 class="mb-0">56,411.33</h5>
										</div>
									</div>
									<div class="d-flex justify-content-between mb-2 align-items-center">
										<div>
											<svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="15" height="15" rx="7.5" fill="#4A8CDA"></rect>
											</svg>
											<span class="fs-14">Linkedin (11%)</span>
										</div>
										<div>
											<h5 class="mb-0">81,981.22</h5>
										</div>
									</div>
									<div class="d-flex justify-content-between mb-2 align-items-center">
										<div>
											<svg class="mr-2" width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="15" height="15" rx="7.5" fill="#6647BF"></rect>
											</svg>
											<span class="fs-14">Whatsapp (23%)</span>
										</div>
										<div>
											<h5 class="mb-0">12,432.51</h5>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
				
<div class="row">
                  
					<div class="col-12">
                        <div class="card">    
                            <div class="card-header  w-100">
            <h4>Most Read Today</h4>
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
                                                Total Views
                                            </th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($most_read as $item)
    <tr>
        <td><b>{{$item->id}}</b></td>
        <td>{{$item->name}}</td>
        <td>{{$item->category->name}}</td>
        <td>
            <img src="{{asset('uploads/posts/'.$item->image)}}"  width="50px" height="50px" style="object-fit: cover;" alt="">
        </td> 
        <td>{{$item->views}}</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
	var _ydata=JSON.parse('{!! json_encode($months) !!}');
	var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
</script>
<script src="{{asset('')}}/assets2/js/chart-area-demo.js"></script>
<script src="{{asset('')}}/assets2/js/chart-bar-demo.js"></script>
                    @endsection