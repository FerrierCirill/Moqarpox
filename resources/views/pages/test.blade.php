<?php
$comps = [];
for($i = 0; $i < sizeof($compagnies); $i++) {
    array_push($comps, array('name'=> $compagnies[$i]['name'], 'lat' => $compagnies[$i]['lat'], 'lng' => $compagnies[$i]['lng'], 'adress' => $compagnies[$i]['adress1'], 'phone' => $compagnies[$i]['phone'], 'email' => $compagnies[$i]['email']));
}

?><!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            #cluster {
                height: 500px;
                width: 70vw;
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
        <div>

        </div>

        <div class="md:flex container border p-4">
            <div class="md:flex-shrink-0">
                <img class="rounded-lg md:w-56" src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80" alt="Woman paying for a purchase">
            </div>
            <div class="mt-4 md:mt-0 md:ml-6">
                <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">Marketing</div>
                <a href="#" class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline">Finding customers for your new business</a>
                <p class="mt-2 text-gray-600">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers.</p>
            </div>
        </div>

        <div id="cluster"></div>
        <script>
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
        
    </body>
</html>
