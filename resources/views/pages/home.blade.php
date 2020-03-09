@extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
	{{-- Header --}}
	@include('components.home.header')


	{{-- Categorie --}}
	<div class="container">
		@include('components.home.categorie')
	</div>

	{{-- Map Zone --}}
	<div class="row pt-5" id="scrollToMap">
		<div class="col s12 m6 l5 p-0 {{--pl-3--}} ">
			@include('components.map')
		</div>
		<div class="col s12 m6 l7 pl-1">
			@include('components.home.displayActivity')
		</div>
		@include('components.home.scriptMap')
	</div>	
@endsection

