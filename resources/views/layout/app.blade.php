<!doctype html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
	
	@include('layout.utils.head')

	<body>
		{{-- Nav --}}
			@include('layout.utils.nav')
		{{-- EndNav --}}

		<div class="min-h-screen">
		{{-- Content --}}
			@yield('content')
		{{-- EndContent --}}
		</div>
		

		{{-- Footer --}}
			@include('layout.utils.footer')
		{{-- EndFooter --}}
	</body>
</html>
