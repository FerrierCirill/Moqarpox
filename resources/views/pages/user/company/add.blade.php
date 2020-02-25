@extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like">Créer une entreprise</h1>
            </div>
            <form action="{{ route('company_add_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col s12 m7">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <label>Nom de votre entreprise *</label>
                            <input placeholder="Nom de votre entreprise"
                                   type="text"
                                   class="validate"
                                   name="name" required
                                   value="{{ old('name') }}"
                            >

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <label>Téléphone *</label>
                            <input type="text"
                                   class="validate"
                                   name="phone" required
                                   value="{{ old('phone') }}"
                            >

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-field col s12 m8">
                            <label>Email *</label>
                            <input type="email"
                                   class="validate"
                                   name="email" required
                                   value="{{ old('email') }}"
                            >

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m4">
                            <label>Siret *</label>
                            <input type="text"
                                   class="validate"
                                   name="siret" required
                                   value="{{ old('siret') }}"
                            >

                            @error('siret')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-field col s12 m8">
                            <label>Rib *</label>
                            <input type="text"
                                   class="validate"
                                   name="rib" required
                                   value="{{ old('rib') }}"
                            >

                            @error('rib')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m8">
                            <label>Adresse *</label>
                            <input id="adress1" type="text"
                                   class="validate"
                                   name="adress1" required
                                   value="{{ old('adress1') }}"
                                   onchange="setMarker()"
                            >
                            @error('adress1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m4">
                            <label>Ville *</label>
                            <input type="text"
                                   class="validate"
                                   name="city"
                                   value="{{ old('city')}}"
                                   list="city"
                                   id="_city"
                                   data-city="-1"
                                   autocomplete="off"
                                   required
                            >
                            <datalist id="city">
                                @foreach($cities as $city)
                                    <option data-city="{{$city->id}}" value="{{$city->code_postal}} {{$city->name}}"></option>
                                @endforeach
                            </datalist>
                            <script>
                                document.getElementById('_city').addEventListener('blur', () => {
                                    document.getElementById('city_id').value =
                                        document.querySelector('[value="'+
                                            document.getElementById('_city').value +'"]')
                                            .getAttribute('data-city');
                                })
                            </script>
                            <input type="text" name="city_id" id="city_id" value="{{ old('city_id') }}" style="display:none" required>
                            @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-field col s12 m12">
                            <label>Complement d'adresse</label>
                            <input type="text"
                                   class="validate"
                                   name="adress2"
                                   value="{{ old('adress2') }}"
                            >
                            @error('adress2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $messages }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label>Description *</label>
                            <textarea type="text"
                                      class="validate materialize-textarea"
                                      name="description" required
                            >{{ old('description') }}</textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 m4 input-field">
                            <select name="category_id" required>
                                <option value="" disabled selected>Catégorie principal</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label>Catégorie principal *</label>
                        </div>
                        <div class="col s6 m8 file-field input-field">
                            <div class="btn">
                                <span>Logo, photo...</span>
                                <input type="file" name="link">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="link_path" type="text" placeholder="Votre logo ou photo de l'entreprise">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input id="lat" name="lat" hidden>
                            <input id="lon" name="lng" hidden>
                            <button class="btn" type="submit">Ajouter <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col s12 m5">
                    <style>
                        #mapid { height: 450px; }
                    </style>
                    <div id="mapid"></div>
                    <script>
                        var mymap = L.map('mapid').setView([46.90296, 1.90925], 5);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoibjRpdmx5cyIsImEiOiJjazU4YThxYTcwYzZrM21tdXRxOXk5b3J6In0.F8-mFYmaIsB1PJMMTrzu6Q'
                        }).addTo(mymap);

                        setMarker = () => {
                            let address = document.getElementById('adress1').value;
                            let req = new XMLHttpRequest();
                            let url = '{{route('api_lat_lng', [':address'])}}';
                            url = url.replace(':address', address);
                            req.open("GET", url, true);
                            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            req.onload = function(){
                                if (this.status == 200) {
                                    let json = JSON.parse(this.responseText);
                                    console.log(json);
                                    mymap.remove();
                                    mymap = L.map('mapid').setView([json[0], json[1]], 13);
                                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                        maxZoom: 18,
                                        id: 'mapbox/streets-v11',
                                        tileSize: 512,
                                        zoomOffset: -1,
                                        accessToken: 'pk.eyJ1IjoibjRpdmx5cyIsImEiOiJjazU4YThxYTcwYzZrM21tdXRxOXk5b3J6In0.F8-mFYmaIsB1PJMMTrzu6Q'
                                    }).addTo(mymap);
                                    let marker = L.marker([json[0], json[1]]).addTo(mymap);
                                    document.getElementById('lat').value = json[0];
                                    document.getElementById('lon').value = json[1];
                                } else {
                                    console.error('erreur de requete AJAX');
                                }
                            };
                            req.send(null);
                        };
                    </script>
                </div>
            </form>
        </div>
    </div>
@endsection
