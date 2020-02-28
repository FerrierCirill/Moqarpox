@extends('layouts.app')

 @section('head-needMapScript', 'ON')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="h2-like">{{$company->name}}</h1>
        </div>

        <form action="{{route('company_edit', ['company_id' => $company->id])}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="col s12 m7">
                <div class="row">
                    <div class="input-field col s12 m12">
                        <label>Nom de votre entreprise *</label>
                        <input placeholder="Nom de votre entreprise"
                               type="text"
                               class="validate"
                               name="name" required
                               @if(old('name'))
                               value="{{ old('name') }}"
                               @else
                               value="{{ $company->name }}"
                            @endif
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
                             @if(old('phone'))
                               value="{{ old('phone') }}"
                               @else
                               value="{{ $company->phone }}"
                             @endif
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
                               @if(old('email'))
                               value="{{ old('email') }}"
                               @else
                               value="{{ $company->email }}"
                            @endif
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
                               @if(old('siret'))
                               value="{{ old('siret') }}"
                               @else
                               value="{{ $company->siret }}"
                            @endif
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
                               @if(old('rib'))
                               value="{{ old('rib') }}"
                               @else
                               value="{{ $company->rib }}"
                            @endif
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
                               @if(old('adress1'))
                               value="{{ old('adress1') }}"
                               @else
                               value="{{ $company->adress1 }}"
                               @endif
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
                               @if(old('city'))
                               value="{{ old('city') }}"
                               @else
                               value="{{ $company->city->code_postal }} {{ $company->city->name }}"
                               @endif
                               list="city"
                               id="_city"
                               data-city="-1"
                               autocomplete="no"
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
                        <input type="text" name="city_id" id="city_id"
                               @if(old('city_id'))
                        value="{{ old('city_id') }}"
                               @else
                               value="{{ $company->city_id }}"
                               @endif
                               style="display:none" required>
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
                               @if(old('adress2'))
                               value="{{ old('adress2') }}"
                               @else
                               value="{{ $company->adress2 }}"
                            @endif
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
                        > @if(old('description'))
                                {{ old('description') }}
                            @else
                                {{ $company->description }}
                            @endif</textarea>

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
                            <option value="" disabled >Catégorie principal</option>
                            @foreach($categories as $category)
                                @if(old('category_id'))
                                    {{$id_cat_save = old('category_id')}}
                                    @else
                                    {{$id_cat_save=$company->category_id}}
                                @endif
                                @if( $category->id == $id_cat_save)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
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
                        <input id="lat" name="lat"
                               @if(old('lat'))
                        value="{{ old('lat') }}"
                               @else
                               value="{{ $company->lat }}"
                               @endif
                               hidden>
                        <input id="lon" name="lng"
                               @if(old('lng'))
                               value="{{ old('lng') }}"
                               @else
                               value="{{ $company->lng }}"
                               @endif
                               hidden>
                        <label for="password">Mot de passe</label>
                        <input type="text" name="password" required>
                        <div class="col s12"><button class="btn" type="submit">Enregistrer <i class="fas fa-save"></i></button></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m5">
                <style>
                    #mapid { height: 450px; }
                </style>
                <div id="mapid"></div>
                <script>
                    document.getElementById('lon').addEventListener('load', loadmap())
                    function loadmap() {
                        var lat = document.getElementById('lat').value
                        var lng = document.getElementById('lon').value
                        console.log('coo:'+lat+'   '+lng)
                        var mymap = L.map('mapid').setView([lat, lng], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            maxZoom: 18,
                            id: 'mapbox/streets-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoibjRpdmx5cyIsImEiOiJjazU4YThxYTcwYzZrM21tdXRxOXk5b3J6In0.F8-mFYmaIsB1PJMMTrzu6Q'
                        }).addTo(mymap);
                        console.log('coo:'+lat+'   '+lng)
                        let marker = L.marker([lat, lng]).addTo(mymap);

                    }

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
                                console.log('json,0:'+json[0]+'1:'+json[1])
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
@endsection
