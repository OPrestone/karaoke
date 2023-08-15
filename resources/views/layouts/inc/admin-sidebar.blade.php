
<nav class="sidebar sidebar-sticky">
			<div class="sidebar-content  js-simplebar">
				<a class="sidebar-brand" href="{{url('/')}}">
          <i class="align-middle" data-feather="mic"></i>
          <span class="align-middle">Karaoke Nation</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item active">
						<a href="{{url('/admin/dashboard')}}" class="font-weight-bold sidebar-link">
              <i class="align-middle fa fa-sliders-h"></i> <span class="align-middle">Dashboard</span>
              <span class="sidebar-badge badge badge-primary">14</span>
            </a> 
					</li>
					<li class="sidebar-header">
					Users 
					</li>
					<li class="sidebar-item">
						<a href="#users" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
            </a>
						<ul id="users" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/users')}}">All Users</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/import-song')}}">Import Users</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-song')}}">Create Song</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#Singers" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-diagnoses"></i>  <span class="align-middle">Singers</span>
            </a>
						<ul id="Singers" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/users')}}">All Users</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/import-song')}}">Import Users</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-song')}}">Create Song</a></li>
						</ul>
					</li>
					<li class="sidebar-header">
					Library 
					</li>
					<li class="sidebar-item">
						<a href="#songs" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-music"></i>  <span class="align-middle">Songs</span>
            </a>
						<ul id="songs" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/all-songs')}}">All Songs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/import-song')}}">Import Songs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-song')}}">Create Song</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#Genres" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-tag"></i>  <span class="align-middle">Genres</span>
            </a>
						<ul id="Genres" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/all-genres')}}">All Genres</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/import-genre')}}">Import Genres</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-genre')}}">Create Genre</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#Artists" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
              <i class="align-middle" data-feather="mic"></i> <span class="align-middle">Artists</span>
            </a>
						<ul id="Artists" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('admin/artists')}}">All Artists</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/import-artist')}}">Import Artists</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-artist')}}">Create Artist</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#video" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
              <i class="align-middle" data-feather="video"></i> <span class="align-middle">Videos</span>
            </a>
						<ul id="video" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/videos')}}">All Videos</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/add-video')}}">Add Videos</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/create-video')}}">Create Artist</a></li>
						</ul>
					</li>
					<li class="sidebar-header">
						Events 
					</li>
					<li class="sidebar-item">
						<a href="#Events" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-compass"></i> <span class="align-middle">Events</span>
            </a>
						<ul id="Events" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/events')}}">All Events</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/add-event')}}">Create Events</a></li> 
						</ul>
					</li>
					<li class="sidebar-header">
						Locations
					</li>
					<li class="sidebar-item">
						<a href="#Locations" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-street-view"></i>  <span class="align-middle">Locations</span>
            </a>
						<ul id="Locations" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/locations')}}">All Locations</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/add-location')}}">Create Location</a></li> 
						</ul>
					</li> 
					<li class="sidebar-header">
						File Manager
					</li>
					<li class="sidebar-item">
						<a href="#albums" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-camera-retro"></i>  <span class="align-middle">Albums</span>
            </a>
						<ul id="albums" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/albums')}}">All Albums</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/admin/add-album')}}">Create Album</a></li> 
						</ul>
					</li> 
				</ul>
 
			</div>
		</nav>
