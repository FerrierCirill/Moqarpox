@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="h2-like">Déposer un avis</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('post_add_comment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field col s12 m6">
                      <label>Code*</label>
                      <input type="text"
                             class="validate"
                             name="code"
                             require>

                      @error('code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="input-field col s12 m6">
                      <label>Titre*</label>
                      <input type="text"
                             class="validate"
                             name="title"
                             require>

                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="input-field col s12">
                      <label>Message*</label>
                      <textarea type="text"
                                class="validate materialize-textarea"
                                name="message"
                                require></textarea>

                      @error('message')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="input-field col s6">
                    <p class="range-field">
                        <label>Note*</label>
                        <input type="range" name="note" min="0" max="5" required/>
                    </p>
                </div>
                <div class="row">
                    <div class="col s12"><button class="btn" type="submit">Déposer</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
