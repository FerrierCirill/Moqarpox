@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like">Créer une entreprise</h1>
            </div>

            <form action="//TODO" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m8">
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
                    <div class="input-field col s12 m6">
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

                    <div class="input-field col s12 m6">
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
                    <div class="input-field col s12 m4">
                        <label>Adresse *</label>
                        <input type="text" 
                            class="validate"
                            name="adress1" required
                            value="{{ old('adress1') }}"
                            >

                        @error('adress1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-field col s12 m4">
                        <label>Complement d'adresse</label>
                        <input type="text" 
                            class="validate"
                            name="adress2"
                            value="{{ old('adress2') }}"
                            >

                        @error('adress2')
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

                    <div class="input-field col s12">
                        {{-- // TODO Map --}}
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label>Description *</label>
                            <textarea type="text" 
                                class="validate materialize-textarea"
                                name="description" required
                                value="{{ old('description') }}"
                                ></textarea>

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
                                <option value="" disabled selected>Categori principal</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label>Categori principal *</label>
                            
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
                        <div class="col s12"><button class="btn" type="submit">Ajouter</button></div>
                    </div>
                </div>
                

            </form>

        </div>
    </div>
@endsection