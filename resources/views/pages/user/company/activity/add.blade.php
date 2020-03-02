@extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like">Créer une activité</h1>
            </div>

        </div>
        <form action="//TODO" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col s6">
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

            <div class="col s6">
              <div class="input-field col s12 m11">
                  <label>Prix*</label>
                  <input placeholder="Entrez le prix de l'activité (en €)"
                         type="number"
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
            <div class="col s6">
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

            <div class="col s6">
              <div class="input-field col s12 m11">
                  <label>Résumé*</label>
                  <textarea placeholder="Entrez le résumé de votre activité..."
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
          </div>

          <div class="row">
            <div class="col s6 ">
              <div class="input-field col s12 m11">
                  <label>Description personnelle (visible seulement par vous)</label>
                  <textarea placeholder="Entrez votre description personnelle"
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

            <div class="col s6 ">
              <div class="input-field col s5">
                <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" autocomplete="category" autofocus>
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

              <div class="input-field col s6">
                <select id="subCategory" type="text" class="form-control @error('subCategory') is-invalid @enderror" name="subCategory" value="{{ old('subCategory') }}" autocomplete="subCategory" autofocus>
                  <option value="other" disabled selected> </option>
                    @foreach($subCategories as $subCategorie)
                        <option value="{{$subCategorie->id}}">{{$subCategorie->name}}</option>
                    @endforeach
                </select>
              <label>Sous-catégorie*</label>

              @error('subCategory')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s3 ">
              <div class="input-field col s12 ">

                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Image 1</span>
                      <input type="file" name="link0">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>

            <div class="col s3 ">
              <div class="input-field col s12 ">

                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Image 2</span>
                      <input type="file" name="link1">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>

            <div class="col s3 ">
              <div class="input-field col s12 ">

                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Image 3</span>
                      <input type="file" name="link2">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
             <div class="col s12"><button class="btn" type="submit">Ajouter <i class="fas fa-save"></i></button></div>
          </div>

            </form>
        </div>
    </div>
@endsection
