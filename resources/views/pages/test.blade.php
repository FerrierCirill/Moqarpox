<?php

?><!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
        <link rel="stylesheet" href="{{ URL::to('/') }}/leaflet/MarkerCluster.css">
        <script src="{{ URL::to('/') }}/leaflet/leaflet.markercluster.js"></script>
        <style>
            #cluster {
                height: 500px;
            }

            .mycluster {
                height: 40px;
                width: 40px;
                border-radius: 50%;
                background-color: #3498db;
                color: white;
                text-align: center;
                font-size: 20px;
                line-height: 40px;
                margin-top: -20px;
                margin-left: -20px;
            }
        </style>
    </head>
    <body>
        <div id="cluster"></div>
        <script>
            function getCities() {
                return [
                    {'name': 'Test', 'lat': 51, 'lon': 6},
                    {'name': 'yo', 'lat': 45, 'lon': 7}
                ];
            }

            let map = L.map('cluster').setView([46.90296, 1.90925], 5);
            let stamenToner = L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', {
                attribution: 'Map tiles by Stamen Design, CC BY 3.0 — &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                minZoom: 1,
                maxZoom: 20,
            });
            map.addLayer(stamenToner);

            let markersCluster = new L.MarkerClusterGroup({
                iconCreateFunction: function(cluster) {return L.divIcon({html: cluster.getChildCount(), className: 'mycluster', iconSize: null});}
            });

            let cities = getCities();
            for (let i = 0; i < cities.length; i++) {
                let latLng = new L.LatLng(cities[i]['lat'], cities[i]['lon']);
                let marker = new L.Marker(latLng, {title: cities[i][0]});
                marker.bindPopup(cities[i]['name']);
                markersCluster.addLayer(marker);
            }

            map.addLayer(markersCluster);
        </script>
    </body>
</html>
