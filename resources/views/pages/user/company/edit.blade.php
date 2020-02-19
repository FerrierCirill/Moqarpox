@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="h2-like">{{$company->name}}</h1>
        </div>

        <form action="{{route('company_edit', ['company_id' => $company->id])}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 m6">
                    <label>Email *</label>
                    <input type="text" 
                        class="validate"
                        name="email" required
                        value="{{ $company->email }}"
                        >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12 m6">
                    <label>Téléphone *</label>
                    <input type="text" 
                        class="validate"
                        name="phone" required
                        value="{{ $company->phone }}"
                        >

                    @error('phone')
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
                        value="{{ $company->siret }}"
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
                        value="{{ $company->rib }}"
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
                        value="{{ $company->adress1 }}"
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
                        value="{{ $company->adress2 }}"
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
                        value="{{ $company->city->name }}"
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

                    <input type="text" name="city_id" id="city_id" value="{{ $company->city_id }}" style="display:none" required>
                    @error('city_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    {{-- // TODO Map --}}
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <label>Description *</label>
                    <textarea type="text" 
                        class="validate materialize-textarea"
                        name="description" required
                        >{{$company->description }}</textarea>

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
                        {{-- <option value="" disabled >Catégorie principal</option> --}} 
                        @foreach($categories as $category)
                            @if( $category->id == $company->category_id)
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
                <div class="col s12"><button class="btn" type="submit">Enregistrer <i class="fas fa-save"></i></button></div>
            </div>
        </form> 
    </div>
@endsection