<!doctype html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">

	@include('layouts.utils.head')

	<body>
		{{-- Nav --}}
			@include('layouts.utils.nav')
		{{-- EndNav --}}

		<div class="min-h-screen">
		{{-- Content --}}
			@yield('content')
		{{-- EndContent --}}
		</div>


		{{-- Footer --}}
			@include('layouts.utils.footer')
		{{-- EndFooter --}}
	</body>
</html>
