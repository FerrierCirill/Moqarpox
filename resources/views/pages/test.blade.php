<?php
$comps = [];
for($i = 0; $i < sizeof($companies); $i++) {
    array_push($comps, array('name'=> $companies[$i]['name'], 'lat' => $companies[$i]['lat'], 'lng' => $companies[$i]['lng'], 'adress' => $companies[$i]['adress1'], 'phone' => $companies[$i]['phone'], 'email' => $companies[$i]['email'], 'category_id' => $companies[$i]['category_id']));
}

?><!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
        <link rel="stylesheet" href="{{ URL::to('/') }}/leaflet/MarkerCluster.css">
        <script src="{{ URL::to('/') }}/leaflet/leaflet.markercluster.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            #cluster {
                height: 100vh;
                width: 100vw;
            }

            .mycluster {
                height: 40px;
                width: 40px;
                border-radius: 50%;
                background-color: #1EA7C8;
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
        <div>

        </div>

        <div id="cluster"></div>
        <script>
            function getCompanies() {
                return <?php echo json_encode($comps)?>;
            }

            let map = L.map('cluster').setView([46.90296, 1.90925], 5);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                minZoom: 5.5,
                maxZoom: 17,
                id: 'mapbox/streets-v11',
                accessToken: 'pk.eyJ1IjoibjRpdmx5cyIsImEiOiJjazU4YThxYTcwYzZrM21tdXRxOXk5b3J6In0.F8-mFYmaIsB1PJMMTrzu6Q',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);

            map.fitBounds([[41.323717,-4.995212], [52.197928,10.242972]]);
            map.setMaxBounds(map.getBounds());

            let markersCluster = new L.MarkerClusterGroup({
                iconCreateFunction: function(cluster) {return L.divIcon({html: cluster.getChildCount(), className: 'mycluster', iconSize: null});}
            });

            let companies = getCompanies();

            let cyanIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsCyan.svg') }}',
                iconSize:     [38, 95], // size of the icon
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            let greenIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsGreen.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor: [-3, -76]});
            let redIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsRed.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor: [-3, -76]});
            let violetIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsViolet.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor:  [-3, -76]});
            let yellowIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsYellow.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor:  [-3, -76]});

            for (let i = 0; i < companies.length; i++) {
                let latLng = new L.LatLng(companies[i]['lat'], companies[i]['lng']);
                switch (companies[i]['category_id']) {
                    case 1 :
                        var marker = new L.Marker(latLng, {title: companies[i][0], icon: violetIcon});
                        break;
                    case 2 :
                        var marker = new L.Marker(latLng, {title: companies[i][0], icon: cyanIcon});
                        break;
                    case 3 :
                        var marker = new L.Marker(latLng, {title: companies[i][0], icon: greenIcon});
                        break;
                    case 4 :
                        var marker = new L.Marker(latLng, {title: companies[i][0], icon: redIcon});
                        break;
                    case 5 :
                        var marker = new L.Marker(latLng, {title: companies[i][0], icon: yellowIcon});
                        break;
                }
                marker.bindPopup(
                    '<strong>' + companies[i]['name'] + '</strong>'
                    + '<br>Adresse : ' + companies[i]['adress']
                    + '<br>Téléphone : ' + companies[i]['phone']
                    + '<br>E-mail : ' + companies[i]['email']
                );
                markersCluster.addLayer(marker);
            }

            map.addLayer(markersCluster);
        </script>

    </body>
</html>
