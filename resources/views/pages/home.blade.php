@extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
	{{-- Header --}}
	@include('components.home.header')


	{{-- Categorie --}}
	<div class="">
		@include('components.home.categorie')
	</div>

	{{-- Map Zone --}}
	<div class="pt-5" id="scrollToMap">
        @include('components.map')

        @include('components.home.displayActivity')

		@include('components.home.scriptMap')
	</div>
@endsection
