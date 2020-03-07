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
	<div class="row">
		<div class="col s12 m4 l8 p-0">
			@include('components.map')
		</div>
		<div class="col s12 m8 l4">
			@include('components.home.displayActivity')
		</div>
	</div>	
@endsection

