<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets2') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="{{ asset('assets2') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/fav.png') }}">
	<link rel="stylesheet" href="{{ asset('assets2/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('assets2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets2/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button{
        padding: 0;
        margin: 0;
    }
    div.dataTables_wrapper div.dataTables_length select{
        width: 50%;
    }
</style>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    /> 
 
 
  </head>
  <style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
    }
    .dz-demo-trigger, .sidebar-right-trigger{
        display: none!important;
    }
  </style>
<body>
@include('layouts.inc.admin-navbar')

<div id="layoutSidenav">
            <div id="layoutSidenav_content">
@include('layouts.inc.admin-sidebar')

                <main>    
                     <div class="content-body">
			<!-- <div class="form-head" style="background-image:url('images/background/bg3.jpg');background-position: bottom; ">
				<div class="container max d-flex align-items-center mt-0">
					<h2 class="font-w600 title text-white mb-2 mr-auto ">Dashboard</h2>
					<div class="weather-btn mb-2">
						<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
						<select class="form-control style-1 default-select  mr-3 ">
							<option>Medan, IDN</option>
							<option>Jakarta, IDN</option>
							<option>Surabaya, IDN</option>
						</select>
					</div>
					<a href="javascript:void(0);" class="btn white-transparent mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
				</div>
			</div> -->
			<div class="container-fluid">
                    @yield('content')
</main>
@include('layouts.inc.admin-footer')
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="{{ asset('assets2/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets2/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('assets2/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('assets2/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('assets2/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('assets2')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets2')}}/js/plugins-init/datatables.init.js"></script>
	
	<script src="{{ asset('assets2/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.min.js') }}"></script>
	<script src="{{ asset('assets2/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets2/js/demo.js') }}"></script>
    <script src="{{ asset('assets2/js/styleSwitcher.js') }}"></script>
<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
<script src="{{ asset('vendor/laraberg/js/tinymce.min.js') }}"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>

<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("#your_summernote").summernote({
            height: 500,
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
<script>
        Laraberg.init('full_text');
</script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });
  </script>
 
 
</body>
</html>
