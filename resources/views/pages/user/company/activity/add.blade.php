@extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like">Créer une activité</h1>
            </div>

        </div>
        <form action="{{route('activity_add_post', $company_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field col s12 m11">
                        <label>Nom de votre activité*</label>
                        <input placeholder="Entrez le nom de votre activité"
                               type="text"
                               class="validate"
                               name="name"
                               value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>

                <div class="col l6 s12">
                    <div class="input-field col s12 m11">
                        <label>Prix*</label>
                        <input placeholder="Entrez le prix de l'activité (en €)"
                               type="number"
                               step="0.01"
                               class="validate"
                               name="price"
                               value="{{ old('price') }}">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field col s12 m11">
                        <label>Description*</label>
                        <textarea placeholder="Entrez la description de votre activité..."
                                  type="text"
                                  class="validate materialize-textarea"
                                  name="description"
                                  value="{{ old('description') }}"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>

                <div class="col l6 s12">
                    <div class="input-field col s12 m11">
                        <label>Résumé*</label>
                        <textarea placeholder="Entrez le résumé de votre activité..."
                                  type="text"
                                  class="validate materialize-textarea"
                                  name="resume"
                                  value="{{ old('resume') }}"></textarea>

                        @error('resume')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12 ">
                    <div class="input-field col s12 m11">
                        <label>Description dates et horaires</label>
                        <textarea placeholder="Entrez les dates/horaires de l'activité"
                                  type="text"
                                  class="validate materialize-textarea"
                                  name="information"
                                  value="{{ old('information') }}" required></textarea>

                        @error('information')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                        <div class="input-field col l5 s12">
                            <select id="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror"
                                    name="category_id"
                                    value="{{ old('category') }}"
                                    autocomplete="category"
                                    onchange="init_sub_cat(this.value)"
                                    autofocus>
                                <option value="other" disabled selected>Sélectionnez une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label>Catégorie*</label>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <script>

                        var subCategories = [
                        @foreach($subCategories as $subCat)
                            {
                                id : '{{$subCat->id}}',
                                name : '{{$subCat->name}}',
                                category_id : '{{$subCat->category_id}}',
                            },
                        @endforeach
                        ];

                        function init_sub_cat(cat_id){
                            console.log('cat_id'+cat_id)

                            let options = '<option value="other" disabled selected>Sélectionnez une catégorie</option>';

                            for(let i=0; i<subCategories.length ; i++){
                                console.log('sub:cat_id'+subCategories[i].category_id)
                                if(subCategories[i].category_id === cat_id){
                                    console.log(' je passse par là ')
                                    options += '<option value="'+subCategories[i].id+'">'+subCategories[i].name+'</option>';}
                            }
                            console.log(options)
                            console.log(document.getElementById("subCategory"));
                            document.getElementById("subCategory").innerHTML = options;
                            console.log(document.getElementById("subCategory").innerHTML);
                        }
                    </script>
                        <div class="input-field col l6 s12">
                            <select id="subCategory"
                                    type="text"
                                    class="browser-default form-control @error('subCategory')is-invalid @enderror"
                                    name="subCategory_id"
                                    value="{{ old('subCategory') }}"
                                    autocomplete="subCategory"
                                    autofocus>
                                <option value="other" disabled selected>Sélectionnez une catégorie</option>
                            </select>
{{--                            <label>Sous-catégorie*</label>--}}

                            @error('subCategory')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>
                <div class="col l6 s12 ">
                    <div class="input-field col s12 m11">
                        <label>Description personnelle (visible seulement par vous)</label>
                        <textarea placeholder="Entrez votre description personnelle"
                                  type="text"
                                  class="validate materialize-textarea"
                                  name="description_perso"
                                  value="{{ old('description_perso') }}"></textarea>

                        @error('description_perso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col l3 s12 ">
                        <div class="input-field col s12 ">

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image 1*</span>
                                    <input type="file" name="link0">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="link_path0" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l3 s12 ">
                        <div class="input-field col s12 ">

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image 2</span>
                                    <input type="file" name="link1">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="link_path1" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l3 s12 ">
                        <div class="input-field col s12 ">

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Image 3</span>
                                    <input type="file" name="link2">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="link_path3" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button class="btn" type="submit">Ajouter <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    </div>
@endsection
