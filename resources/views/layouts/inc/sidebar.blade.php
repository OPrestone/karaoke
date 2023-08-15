
<nav class="sidebar sidebar-sticky">
			<div class="sidebar-content  js-simplebar">
				<a class="sidebar-brand" href="{{url('/')}}">
          <i class="align-middle" data-feather="mic"></i>
          <span class="align-middle">Karaoke Nation</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item active">
						<a href="{{url('/events')}}" class="font-weight-bold sidebar-link">
						<i class="align-middle fa fa-compass"></i> <span class="align-middle">Events</span>
              <span class="sidebar-badge badge badge-primary">6</span>
            </a>
					</li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/live')}}">
						<i class="align-middle fa fa-rss"></i>  Live</a></li>
					<li class="sidebar-header">
					Library
					</li>
					<li class="sidebar-item">
						<a href="#songs" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-music"></i>  <span class="align-middle">Songs</span>
            </a>
						<ul id="songs" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/songs')}}">All Songs</a></li>
						</ul>
					</li> 
					<li class="sidebar-item">
						<a href="#Artists" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
              <i class="align-middle" data-feather="mic"></i> <span class="align-middle">Artists</span>
            </a>
						<ul id="Artists" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/artists')}}">All Artists</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#video" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
              <i class="align-middle" data-feather="video"></i> <span class="align-middle">Videos</span>
            </a>
						<ul id="video" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/videos')}}">All Videos</a></li>
						</ul>
					</li>
					<li class="sidebar-header">
						Events
					</li>
					<li class="sidebar-header">
						File Manager
					</li>
					<li class="sidebar-item">
						<a href="#albums" data-toggle="collapse" class="font-weight-bold sidebar-link collapsed">
						<i class="align-middle fa fa-camera-retro"></i>  <span class="align-middle">Albums</span>
            </a>
						<ul id="albums" class="sidebar-dropdown list-unstyled collapse ">
							<li class="sidebar-item"><a class="sidebar-link" href="{{url('/albums')}}">All Albums</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</nav>
