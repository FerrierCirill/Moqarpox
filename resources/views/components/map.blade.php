<div id="cluster" class="h-full">
</div>

<script>
    function getCompanies() {return @json($companies);}
    function getCategories() {return @json($categories);}
    function getSubCategories() {return @json($subCategories);}

    let companies = getCompanies();
    let map = L.map('cluster').setView([46.90296, 1.90925], 5);

    let cyanIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsCyan.svg') }}',
        iconSize:     [38, 95], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    let greenIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsGreen.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor: [-3, -76]});
    let redIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsRed.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor: [-3, -76]});
    let violetIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsViolet.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor:  [-3, -76]});
    let yellowIcon = L.icon({iconUrl: '{{ asset('images/geo/gpsYellow.svg') }}', iconSize: [38, 95], iconAnchor: [22, 94], popupAnchor:  [-3, -76]});

    generateMap = () => {
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
    };

    generateMultiMarker = (companies) => {
        let markersCluster = new L.MarkerClusterGroup({iconCreateFunction: function(cluster) {return L.divIcon({html: cluster.getChildCount(), className: 'mycluster', iconSize: null});}});

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
            marker.on('click', function () {
                let result = document.getElementById('activities');
                let req = new XMLHttpRequest();
                let url = '{{route('api_activities_of_company', [':company_id'])}}';
                url = url.replace(':company_id',companies[i]['id']);
                req.open("GET", url, true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.onload = function(){
                    if (this.status == 200) {
                        let json = JSON.parse(this.responseText);
                        result.innerHTML = '';
                        for(let i = 0; i < json.length; i++) {
                            let url = '{{route('activity_details', [':activity_id'])}}';
                            url = url.replace(':activity_id',json[i]['id']);

                            let html = 
                                `<div class="homeActivity">
                                    <div class="homeActivity-img" style="background:url('{{--asset('storage')--}}${json[i]['link0']}')"></div>
                                    <div class="homeActivity-main">
                                        <h6>${json[i]['name']}</h6>
                                        ${json[i]['price']}
                                        ${json[i]['description_perso']}
                                        <a href="${url}">Voir l'activité</a>
                                    </div>
                                </div>`;
                            result.innerHTML += html;
                        }
                    } else {
                        console.error('erreur de requete AJAX');
                    }
                };
                req.send(null);

            });
            marker.bindPopup(
                '<strong>' + companies[i]['name'] + '</strong>'
                + '<br>Adresse : ' + companies[i]['adress1']
                + '<br>Téléphone : ' + companies[i]['phone']
                + '<br>E-mail : ' + companies[i]['email']
            );
            markersCluster.addLayer(marker);
        }
        map.addLayer(markersCluster);
    };

    generateSomeMarker = (companies) => {
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
            marker.on('click', function () {
                let result = document.getElementById('activities');
                let req = new XMLHttpRequest();
                let url = '{{route('api_activities_of_company', [':company_id'])}}';
                url = url.replace(':company_id',companies[i]['id']);
                req.open("GET", url, true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.onload = function(){
                    if (this.status == 200) {
                        let json = JSON.parse(this.responseText);
                        result.innerHTML = '';
                        for(let i = 0; i < json.length; i++) {
                            let url = '{{route('activity_details', [':activity_id'])}}';
                            url = url.replace(':activity_id',json[i]['id']);

                            let html = '<div class="activity">Nom : ' + json[i]['name'] + '<br>' +
                                'Prix : ' + json[i]['price'] + ' € <br>' +
                                'Description : ' + json[i]['description_perso'] + '<br>' +
                                '<a href="' + url + '">Voir l\'activité</a></div>';
                            result.innerHTML += html;
                        }
                    } else {
                        console.error('erreur de requete AJAX');
                    }
                };
                req.send(null);

            });
            marker.bindPopup(
                '<strong>' + companies[i]['name'] + '</strong>'
                + '<br>Adresse : ' + companies[i]['adress1']
                + '<br>Téléphone : ' + companies[i]['phone']
                + '<br>E-mail : ' + companies[i]['email']
            );
            marker.addTo(map);
        }
    };

    generateMap();
    generateMultiMarker(companies);

    searchCompanies = () => {
        let value = document.getElementById('search').value;
        let type = document.getElementById('type').value;

        let req = new XMLHttpRequest();

        let url = '{{route('api_main_search', [':type', ':value'])}}';
        url = url.replace(':type',type);
        url = url.replace(':value',value);

        req.open("GET", url, true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.onload = function(){
            if (this.status == 200) {
                let json = JSON.parse(this.responseText);
                console.log(json.length);
                if(json.length > 50) {
                    map.remove();
                    map = L.map('cluster').setView([46.90296, 1.90925], 5);
                    generateMap();
                    generateMultiMarker(json);
                } else {
                    map.remove();
                    map = L.map('cluster').setView([46.90296, 1.90925], 5);
                    generateMap();
                    generateSomeMarker(json);
                }
            } else {
                console.error('erreur de requete AJAX');
            }
        };
        req.send(null);
    };

    setdatalist = () => {
        let value = document.getElementById('search').value;
        let datalist = document.getElementById('results');

        let req = new XMLHttpRequest();
        let url = '{{route('api_datalist', [':value'])}}';
        url = url.replace(':value',value);

        req.open("GET", url, true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.onload = function(){
            if (this.status == 200) {
                let json = JSON.parse(this.responseText);
                datalist.innerHTML = '';
                if (json['activities'].length != 0) {
                    for(let i = 0; i < json['activities'].length; i++) {
                        datalist.innerHTML += '<option value="' + json['activities'][i]['name'] + '">Activités</option>';
                    }
                }
                if (json['cities'].length != 0) {
                    for(let i = 0; i < json['cities'].length; i++) {
                        datalist.innerHTML += '<option value="' + json['cities'][i]['name'] + '">Villes</option>';
                    }
                }
                if (json['categories'].length != 0) {
                    for(let i = 0; i < json['categories'].length; i++) {
                        datalist.innerHTML += '<option value="' + json['categories'][i]['name'] + '">Catégories</option>';
                    }
                }
                if (json['subCategories'].length != 0) {
                    for(let i = 0; i < json['subCategories'].length; i++) {
                        datalist.innerHTML += '<option value="' + json['subCategories'][i]['name'] + '">Sous-catégories</option>';
                    }
                }
            } else {console.error('erreur de requete AJAX');}
        };
        req.send(null);

        var opts = datalist.childNodes;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === value) {
                document.getElementById('type').value = opts[i].textContent;
                break;
            }
        }
    };
</script>