<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
        <link rel="stylesheet" href="{{ URL::to('/') }}/leaflet/MarkerCluster.css">
        <script src="{{ URL::to('/') }}/leaflet/leaflet.markercluster.js"></script>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            .container {
                display: flex;
                flex-direction: row;
            }

            #cluster {
                height: 100vh;
                width: 70vw;
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
        <div class="container">
            <div id="cluster"></div>
            <div>
                <form>
                    <label for="what">Quoi ? </label>
                    <input type="text" id="what"><br>
                    <label for="where">Où ? </label>
                    <input type="text" id="where"><br>
                    <label for="category">Catégorie : </label>
                    <select id="category" onchange="updateSubCategories()">
                        <option value="null">--</option>
                    </select><br>
                    <label for="subCategory">Sous-catégorie : </label>
                    <select id="subCategory">
                        <option value="null">--</option>
                    </select><br>
                    <button type="button" onclick="recherche()">Rechercher</button>
                </form>
            </div>
        </div>
        <script>
            function getCompanies() {return <?php echo json_encode($companies)?>;}
            function getCategories() {return <?php echo json_encode($categories)?>;}
            function getSubCategories() {return <?php echo json_encode($subCategories)?>;}

            let companies = getCompanies();
            let map = L.map('cluster').setView([46.90296, 1.90925], 5);

            generateMap = (companies) => {
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

                let markersCluster = new L.MarkerClusterGroup({iconCreateFunction: function(cluster) {return L.divIcon({html: cluster.getChildCount(), className: 'mycluster', iconSize: null});}});

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
            };

            generateMap(companies);

            recherche = () => {
                let category_id = document.getElementById('category').value;
                let subCategory_id = document.getElementById('subCategory').value;
                let what = document.getElementById('what').value;
                if (what == '') what = 'null';
                let where = document.getElementById('where').value;
                if (where == '') where = 'null';

                let req = new XMLHttpRequest();

                let url = '{{route('api_map_update', [':category_id', ':subCategory_id', ':what', ':where'])}}';
                url = url.replace(':category_id',category_id);
                url = url.replace(':subCategory_id',subCategory_id);
                url = url.replace(':what',what);
                url = url.replace(':where',where);

                req.open("GET", url, true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.onload = function(){
                    if (this.status == 200) {
                        let json = JSON.parse(this.responseText);
                        map.remove();
                        map = L.map('cluster').setView([46.90296, 1.90925], 5);
                        generateMap(json);
                    } else {
                        console.error('erreur de requete AJAX');
                    }
                };
                req.send(null);
            };

            initialisation = () => {
                let categories = getCategories();
                let select = document.getElementById('category');
                for(let i = 0; i < categories.length; i++) {
                    select.innerHTML += '<option value="' + categories[i]['id'] + '">' + categories[i]['name'] + '</option>';
                }
            };

            updateSubCategories = () => {
                let subCategories = getSubCategories();
                let category_id = document.getElementById('category').value;
                let select = document.getElementById('subCategory');
                select.innerHTML = '<option value="null">--</option>';
                for(let i = 0; i < subCategories.length; i++) {
                    if (subCategories[i]['category_id'] == category_id) {
                        select.innerHTML += '<option value="' + subCategories[i]['id'] + '">' + subCategories[i]['name'] + '</option>';
                    }
                }
            };

            initialisation();
        </script>

    </body>
</html>
