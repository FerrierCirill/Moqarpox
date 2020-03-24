<script>
    function getCompanies() {return @json($companiesMap);}
    function getCategories() {return @json($categories);}
    function getSubCategories() {return @json($subCategories);}

    document.getElementById('activities').innerHTML = document.getElementById('activities').innerHTML = `
                        <h6 class="m-0">Résultat : {{ sizeof($companiesMap) }} entreprise.s trouvée.s
                            <button class="btn right" onclick="resetBtn();">Reset</button>
                        </h6>
                        <hr style="float:left; width:75%">`


    let companies = getCompanies();
    let map = L.map('cluster').setView([46.93517913608688, 6.998149223314707], 6);

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
            minZoom: 6,
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
                                `<a href="${url}" class="col s12 m6 l4 ">
                                    <div class="homeActivity w-100">
                                        <div class="homeActivity-div">
                                            <div class="homeActivity-div-img"
                                                style="background:url('{{--asset('storage')--}}${json[i]['link0']}')">
                                            </div>
                                        </div>
                                        <div class="homeActivity-main">
                                            <h6 class="black-text mb-0">${json[i]['name']}</h6>
                                            <span class="homeActivity-price mt-0">${json[i]['price']} €</span>
                                        </div>
                                        <p class="grey-text mt-0">
                                            Note : ${json[i]['note']} / 5
                                        </p>

                                    </div>
                                </a>`;
                            result.innerHTML += html;
                        }
                    } else {
                        console.error('erreur de requete AJAX');
                    }
                };
                req.send(null);

            });
            marker.bindPopup(
                '<h4 style="margin-bottom:10px"><strong>' + companies[i]['name'] + '</strong></h4>' +
                `<table class="responsive-table maptable">
                    <tr>
                        <td>Adresse :</td>
                        <td>${companies[i]['adress1']}</td>
                    </tr>
                    <tr>
                        <td>Téléphone :</td>
                        <td>${companies[i]['phone']}</td>
                    </tr>
                    <tr>
                        <td>E-mail :</td>
                        <td>${companies[i]['email']}</td>
                    </tr>`
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

//ICI
                            let html =
                                `<a href="${url}" class="col s12 m6 l4 ">
                                    <div class="homeActivity w-100">
                                        <div class="homeActivity-div">
                                            <div class="homeActivity-div-img"
                                                style="background:url('{{--asset('storage')--}}${json[i]['link0']}')">
                                            </div>
                                        </div>
                                        <div class="homeActivity-main">
                                            <h6 class="black-text mb-0">${json[i]['name']}</h6>
                                            <span class="homeActivity-price mt-0">${json[i]['price']} €</span>
                                        </div>
                                        <p class="grey-text mt-0">
                                            Note : ${json[i]['note']} / 5
                                        </p>

                                    </div>
                                </a>`;
                            result.innerHTML += html;
                        }
                    } else {
                        console.error('erreur de requete AJAX');
                    }
                };
                req.send(null);

            });
            marker.bindPopup(
                '<h4 style="margin-bottom:10px"><strong>' + companies[i]['name'] + '</strong></h4>' +
                `<table class="responsive-table maptable">
                    <tr>
                        <td>Adresse :</td>
                        <td>${companies[i]['adress1']}</td>
                    </tr>
                    <tr>
                        <td>Téléphone :</td>
                        <td>${companies[i]['phone']}</td>
                    </tr>
                    <tr>
                        <td>E-mail :</td>
                        <td>${companies[i]['email']}</td>
                    </tr>`
            );
            marker.addTo(map);
        }
    };

    generateMap();
    generateMultiMarker(companies);

    searchCompanies = (value) => {
        // let value = document.getElementById('search').value;
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
                    map = L.map('cluster').setView([46.93517913608688, 6.998149223314707], 6);
                    generateMap();
                    generateMultiMarker(json);
                } else {
                    map.remove();
                    map = L.map('cluster').setView([46.93517913608688, 6.998149223314707], 6);
                    generateMap();
                    generateSomeMarker(json);
                }
            } else {
                console.error('erreur de requete AJAX');
            }
        };
        req.send(null);
    };

    setdatalist = (value) => {
        // let value = document.getElementById('search').value;
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


    recherche = (btnCategory = null) => {
        console.log(btnCategory);

        let category_id    = document.getElementById('category').value;
        let subCategory_id = document.getElementById('subCategory').value;
        let what           = document.getElementById('what').value;
        let where          = document.getElementById('where').value;
        let min            = document.getElementById('lower').value;
        let max            = document.getElementById('upper').value;
        if  (subCategory_id == 'null') subCategory_id = 'null';
        if  (category_id    == 'null') category_id    = 'null';
        if  (what           == '')     what           = 'null';
        if  (where          == '')     where          = 'null';

        let req = new XMLHttpRequest();
        let url = '{{route('api_map_update', [':category_id', ':subCategory_id', ':what', ':where', ':min', ':max'])}}';

        if (btnCategory == null) {
            url = url.replace(':category_id',category_id);
            url = url.replace(':subCategory_id',subCategory_id);
            url = url.replace(':what',what);
            url = url.replace(':where',where);
            url = url.replace(':min',min);
            url = url.replace(':max',max);
        }
        else {
            if (btnCategory == 'reset') {
                url = '{{route('api_map_update', ['null', 'null', 'null', 'null', 'null', 'null'])}}';

            }
            else {
                url = '{{route('api_map_update', [':category_id', 'null', 'null', 'null', '0', '9999999'])}}';
                url = url.replace(':category_id',btnCategory);
            }
        }


        req.open("GET", url, true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.onload = function(){
            if (this.status == 200) {
                location.hash = '#scrollToCategorie';
                location.hash = '#scrollToMap';

                document.getElementById('activities').innerHTML = '';
                let json = JSON.parse(this.responseText);
                console.log(json);
                console.log(json.length);
                map.remove();
                map = L.map('cluster').setView([46.93517913608688, 6.998149223314707], 6);
                generateMap(json);
                generateMultiMarker(json);
                if (json.length == 0) {
                    document.getElementById('activities').innerHTML = `
                        <h5 class="m-0">Aucun résultat</h5>
                    `
                }
                else {
                    document.getElementById('activities').innerHTML = `
                        <h6 class="m-0">Résultat : ${json.length} entreprise.s trouvée.s
                            <button class="btn right" onclick="resetBtn();">Reset</button>
                        </h6>
                        <hr style="float:left; width:75%">`
                }
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
        console.log(category_id);
        console.log(subCategories);
        let select = document.getElementById('subCategory');
        select.innerHTML = '<option value="null">--</option>';
        for(let i = 0; i < subCategories.length; i++) {
            if (subCategories[i]['category_id'] == category_id) {
                select.innerHTML += '<option value="' + subCategories[i]['id'] + '">' + subCategories[i]['name'] + '</option>';
            }
        }

        let instance = M.FormSelect.getInstance(document.getElementById('subCategory'));
        instance.constructor(document.getElementById('subCategory'));
    };

    initialisation();



    // Cirill
    var switchSearchEngine_open = 0

    function switchSearchEngine() {
        // switchSearchEngine_open++;
        // let v = switchSearchEngine_open%3;
        // switch (v) {
        //     case 0:
        //         document.getElementById('switchSearchEngine-0').setAttribute('style', 'display:flex');

        //         document.getElementById('switchSearchEngine-1').setAttribute('style', 'display:none');
        //         document.getElementById('switchSearchEngine-2').setAttribute('style', 'display:none');

        //         break;

        //     case 1:
        //         document.getElementById('switchSearchEngine-1').setAttribute('style', 'display:flex');

        //         document.getElementById('switchSearchEngine-0').setAttribute('style', 'display:none');
        //         document.getElementById('switchSearchEngine-2').setAttribute('style', 'display:none');
        //         break;

        //     case 2:
        //         document.getElementById('switchSearchEngine-2').setAttribute('style', 'display:flex');

        //         document.getElementById('switchSearchEngine-0').setAttribute('style', 'display:none');
        //         document.getElementById('switchSearchEngine-1').setAttribute('style', 'display:none');
        //         break;

        //     default:
        //         break;
        // }

        if (switchSearchEngine_open % 2 == 0) {
            document.getElementById('switchSearchEngine-0').setAttribute('style', 'display:flex')
            document.getElementById('switchSearchEngine-1').setAttribute('style', 'display:flex')

            document.getElementById('addH6').innerHTML = `
                <h6>Recherche avancée</h6>
                <div style="width:45%">
                    <input type="text" placeholder="Quoi ?"  id="what" value="${document.getElementById('what').value}">
                </div>
                <div style="width:45%">
                    <input type="text" placeholder="Où ? "  id="where" value="${document.getElementById('where').value}">
                </div>
            `;

            document.getElementById('btnZone').innerHTML = `
                <div style="margin-right:2rem">
                    <i class="fas fa-caret-up" onclick="switchSearchEngine()"></i>
                </div>
                <div>
                    <button type="button" onclick="recherche()" class="btn right">Rechercher</button>
                </div>
            `
        }
        else {
            document.getElementById('switchSearchEngine-0').setAttribute('style', 'display:none');
            document.getElementById('switchSearchEngine-1').setAttribute('style', 'display:none');

            document.getElementById('addH6').innerHTML = `
                <div class="w-35">
                    <input type="text" placeholder="Quoi ?"  id="what" value="${document.getElementById('what').value}">
                </div>
                <div class="w-35">
                    <input type="text" placeholder="Où ? "  id="where" value="${document.getElementById('where').value}">
                </div>
                <div>
                    <i class="fas fa-caret-down" onclick="switchSearchEngine()"></i>
                </div>
                <div>
                    <button type="button" onclick="recherche()" class="btn right">Rechercher</button>
                </div>
            `;

            document.getElementById('btnZone').innerHTML = ``
        }
        switchSearchEngine_open++;
    }

    var lowerSlider = document.querySelector('#lower'),
        upperSlider = document.querySelector('#upper'),
        lowerVal    = parseInt(lowerSlider.value);
        upperVal    = parseInt(upperSlider.value);

    upperSlider.oninput = function() {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 10) {
            lowerSlider.value = upperVal - 10;

            if (lowerVal == lowerSlider.min) {
                upperSlider.value = 10;
            }
        }
        document.getElementById('min').innerHTML = 'Min:<br>'+lowerVal;
        document.getElementById('max').innerHTML = 'Max:<br>'+upperVal;
    };


    lowerSlider.oninput = function() {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (lowerVal > upperVal - 10) {
            upperSlider.value = lowerVal + 10;

            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 10;
            }

        }
        document.getElementById('min').innerHTML = 'Min:<br>'+lowerVal;
        document.getElementById('max').innerHTML = 'Max:<br>'+upperVal;
    };


    function resetBtn() {
        recherche('reset');
    }


</script>
