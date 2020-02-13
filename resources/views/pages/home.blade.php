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
	<div class="container">
		<div class="col s12 m4 l5">
			@include('components.map')
		</div>
		<div class="col s12 m8 l7">
			@include('components.home.displayActivity')
		</div>
	</div>

	<script>
		<?php
			$comps = [];
			for($i = 0; $i < sizeof($companies); $i++) {
				array_push($comps, array('name'=> $companies[$i]['name'], 'lat' => $companies[$i]['lat'], 'lng' => $companies[$i]['lng'], 'adress' => $companies[$i]['adress1'], 'phone' => $companies[$i]['phone'], 'email' => $companies[$i]['email']));
			}
		?>

		function getCities() {
			return <?php echo json_encode($comps)?>;
		}

		let map = L.map('cluster').setView([46.90296, 1.90925], 5);
		let stamenToner = L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', {
			attribution: 'Map tiles by Stamen Design, CC BY 3.0 — &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
			minZoom: 4,
			maxZoom: 17,
		});
		map.addLayer(stamenToner);

		map.fitBounds([
			[41.323717,-4.995212],
			[52.197928,10.242972]
		]);
		map.setMaxBounds(map.getBounds());

		let markersCluster = new L.MarkerClusterGroup({
			iconCreateFunction: function(cluster) {return L.divIcon({html: cluster.getChildCount(), className: 'mycluster', iconSize: null});}
		});

		let cities = getCities();
		for (let i = 0; i < cities.length; i++) {
			let latLng = new L.LatLng(cities[i]['lat'], cities[i]['lng']);
			let marker = new L.Marker(latLng, {title: cities[i][0]});
			marker.bindPopup(
				'<strong>' + cities[i]['name'] + '</strong>'
				+ '<br>Adresse : ' + cities[i]['adress']
				+ '<br>Téléphone : ' + cities[i]['phone']
				+ '<br>E-mail : ' + cities[i]['email']
			);
			markersCluster.addLayer(marker);
		}

		map.addLayer(markersCluster);
	</script>
@endsection
