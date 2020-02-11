<head>
	{{-- META --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	{{-- TITLE --}}
	<title>
		@if(View::hasSection('head-title'))
			@yield('head-title')
		@else
			Mouqarpox
		@endif
	</title>
	
	{{-- CSS --}}
	<link href="{{ asset('css/materialize.css') }}" rel="stylesheet">

	{{-- FontAwsome --}}
	<script src="https://kit.fontawesome.com/e6fd80ae53.js" crossorigin="anonymous"></script>
	
	{{-- JS --}}
	<script src="{{asset('/js/materialize/bin/materialize.min.js')}}"></script>
	<script src="{{asset('/js/script.js')}}"></script>
		{{-- MAP SCRIPT --}}
			@if(View::hasSection('head-needMapScript'))
				<!-- MAP SCRIPT LOAD -->
				<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
				<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
				<link rel="stylesheet" href="{{ URL::to('/') }}/leaflet/MarkerCluster.css">
				<script src="{{ URL::to('/') }}/leaflet/leaflet.markercluster.js"></script>
			@endif
		{{--  --}}
</head>
